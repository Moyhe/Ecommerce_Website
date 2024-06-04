<?php

namespace App\Listeners;

use App\Jobs\UpdateCoupon;
use App\Models\Coupon;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartUpdateListener
{
    /**
     * Create the event listener.
     */



    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $couponName = session()->get('coupon')['name'] ?? null;

        if($couponName) {
            $coupon = Coupon::where('code', $couponName)->first();
            dispatch_sync(new UpdateCoupon($coupon));
        }

    }
}
