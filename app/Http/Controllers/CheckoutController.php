<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Coupon $coupon)
    {
        $discount = $coupon->getCoupon()->get('discount');
        $newSubTotal = $coupon->getCoupon()->get('newSubtotal');
        $newTax = $coupon->getCoupon()->get('newTax');
        $newTotal = $coupon->getCoupon()->get('newTotal');

        $token =  $this->paymentAPI();

       return view('checkout.index', compact(['discount', 'newSubTotal', 'newTax', 'newTotal', 'token']));
    }


    public function store(CheckoutRequest $request, Coupon $coupon)
    {
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        $data = json_decode(request());

        $amount_cents = $data->obj->amount_cents;
        $created_at = $data->obj->order->created_at;
        $currency = $data->obj->currency;
        $error_occured = $data->obj->error_occured;
        $has_parent_transaction = $data->obj->has_parent_transaction;
        $transaction_id = $data->obj->id;
        $integration_id = $data->obj->integration_id;
        $is_3d_secure = $data->obj->is_3d_secure;
        $is_auth = $data->obj->is_auth;
        $is_capture = $data->obj->is_capture;
        $is_refunded = $data->obj->is_refunded;
        $is_standalone_payment = $data->obj->is_standalone_payment;
        $is_voided = $data->obj->is_voided;
        $order_id = $data->obj->order->id;
        $owner = $data->obj->owner;
        $pending = $data->obj->pending;
        $source_data_pan = $data->obj->source_data->pan;
        $source_data_type= $data->obj->source_data->type;
        $source_data_sub_type  = $data->obj->source_data->sub_type;
        $success = $data->obj->success;


        $request_hashMac = $amount_cents.$created_at.$currency.$error_occured.$has_parent_transaction.$transaction_id.$integration_id.$is_3d_secure.$is_auth.$is_capture.$is_refunded.$is_standalone_payment.$is_voided.$order_id.$owner.$pending.$source_data_pan.$source_data_type.$source_data_sub_type.$success;

        $hased_hasMac = hash_hmac('SHA512', $request_hashMac, '3DF769E523C37F97A83AD1D4AF1A282C');

        $hashMac = $data->obj->data->secure_hash;


        if ($hased_hasMac === $hashMac) {

           try {

            $order = $this->placeOrders($transaction_id, $order_id, $pending, $success, $request, null, $coupon);
            Mail::to(request()->user())->send(new OrderShipped($order));

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

           Cart::instance('default')->destroy();
           session()->forget('coupon');

         } catch (CartAlreadyStoredException $e) {
            $this->placeOrders($transaction_id, $order_id, $pending, $success, $request, $e->getMessage(), $coupon);
           }


        }

        return;
    }

    protected function placeOrders($transaction_id, $order_id, $pending, $success, $request, $error, $coupon)
    {

        // Insert into orders table
        $order = Order::create([
        'user_id' => auth()->user() ? auth()->user()->id : null,
        'email' =>  $request,
        'first_name' =>   $request,
        'address'=> $request,
        'city' =>   $request,
        'last_name' => $request,
        'country' => $request,
        'phone' => $request,
        'transaction_id' => $transaction_id,
        'order_number' => $order_id,
        'pending' => $pending,
        'success' => $success,
        'totalPrice' => $coupon->getCoupon()->get('newTotal'),
        'error' => $error

    ]);

     // Insert into order_product table
     foreach (Cart::content() as $item) {
        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $item->model->id,
            'quantity' => $item->qty,
        ]);
    }

     return $order;

    }


    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
             $product = Product::find($item->model->id);

             $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }


    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }



    protected function paymentAPI()
    {
        $auth = $this->authAPI();
        $order = $this->orderAPI($auth);

        $PaymentKey = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', [
            "auth_token" => $auth['token'],
            "amount_cents" => "100",
            "expiration" => 3600,
            "order_id" => $order['id'],
            "billing_data" => [
                "apartment" => "803",
                "email" => "claudette09@exa.com",
                "floor" => "42",
                "first_name" => "Clifford",
                "street" => "Ethan Land",
                "building" => "8028",
                "phone_number" => "+86(8)9135210487",
                "shipping_method" => "PKG",
                "postal_code" => "01898",
                "city" => "Jaskolskiburgh",
                "country" => "CR",
                "last_name" => "Nicolas",
                "state" => "Utah"
            ],
                "currency" => "EGP",
                "integration_id" => 4015322

        ])->throw()->json();

        return   $PaymentKey['token'];
    }


    protected function authAPI()
    {
        return Http::post('https://accept.paymob.com/api/auth/tokens', [
            'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T0RVMU16TXpMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuS0FnTEk0b1hrcHVCQXZIZ05fcGd3aHdxSFRGV1VTRGNFQ0kxNl9vUTc2SkdWdXNWMGxrRnNJYmN3LWdubWFzZEMwMFB6U2FFazJvWWRTVFBoV0lhVkE='

        ])->throw()->json();
    }


    protected function orderAPI($auth)
    {
        return Http::post('https://accept.paymob.com/api/ecommerce/orders', [
            "auth_token" => $auth['token'],
            "delivery_needed" => "false",
            "amount_cents" => "100",
            "currency" => "EGP",
            "items" => []

        ])->throw()->json();
    }



}
