<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['cart_id', 'amount', 'payment_method'];

    /**
     * Get the user that owns the payment.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
