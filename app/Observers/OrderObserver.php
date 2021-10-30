<?php

namespace App\Observers;

use App\Jobs\DeleteCartItems;
use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Payment "failed" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function failed(Order $order)
    {
        DeleteCartItems::dispatch($order)
            ->delay(now()->addSeconds(5));
    }
}
