<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateCoupon;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();

        if(!$coupon) return back()->withErrors('Invalid coupon code. Please try again.');

        dispatch_sync(new UpdateCoupon($coupon));
        return back()->with('success', 'Coupon has been applied!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        session()->forget('coupon');
        return back()->with('success', 'Coupon has been removed.');
    }
}
