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

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the comments for the product.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The amazings that belong to the product.
     */
    public function amazings()
    {
        return $this->belongsToMany(Amazing::class);
    }
}
