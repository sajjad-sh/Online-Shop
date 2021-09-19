<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    //todo: category for specification
    protected $fillable = [
        'card_id',
        'address_id',
        'status',
        'payment_method',
        'cancel_reason',
    ];

    /**
     * Get the cart that owns the order.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the address that owns the Order.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
