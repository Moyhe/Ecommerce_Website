<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;

class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if(Cart::instance('default'))
        session()->put('coupon', [
           'name' => $this->coupon->code,
           'discount' => $this->coupon->discount(Cart::subtotal()),
        ]);
    }
}
