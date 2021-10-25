<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'discount_id',
        'count',
        'total_price',
        'net_price'
    ];

    /**
     * Get the user associated with the cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order associated with the cart.
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    /**
     * Get the discount that owns the cart.
     */
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    /**
     * Get the cart items for the cart.
     */
    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }


    /**
     * Get the payments for the user.
     */
    public function payments()
    {
        return $this->hasOne(Payment::class);
    }

}
