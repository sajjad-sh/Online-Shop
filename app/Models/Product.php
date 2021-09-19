<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'fa_title',
        'en_title',
        'price',
        'inventory',
        'sales',
        'visits',
        'rate',
        'review',
        'primary_specifications',
        'special_specifications',
        'status'
    ];

    //TODO: casts?

    /**
     * Get the card items for the product.
     */
    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }
}
