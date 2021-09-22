<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;


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
    public function amazing()
    {
        return $this->belongsTo(Amazing::class);
    }

    /**
     * Get all of the images for the product.
     */
    public function images()
    {
        return $this->morphToMany(Product::class, 'imageable');
    }

    /**
     * The primary specification values that belong to the product.
     */
    public function primary_specification_values()
    {
        return $this->belongsToMany(PrimarySpecificationValue::class, 'product_spec', 'product_id', 'spec_id');
    }
}
