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
        'description',
        'slug',
        'price',
        'inventory',
        'sales',
        'visits',
        'rate',
        'review',
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
        return $this->morphToMany(Image::class, 'imageable');
    }

    /**
     * The attribute values that belong to the product.
     */
    public function att_values()
    {
        return $this->belongsToMany(AttValue::class, 'att_product', 'product_id', 'att_id')->withTimestamps();
    }

    public static function calculateDiscount($type, $amount, $price)
    {
        if ($type == 0)
            return $price - ($amount/100 * $price);

        return $price - $amount;
    }

    # TODO: use accessor for user defined function and instead of query in blade

    /**
     * a query for fetch brand of product.
     */
    public function getBrandAttribute()
    {
        foreach ($this->att_values as $att_value) {
            if(AttTitle::find($att_value->att_title_id)->key == 'brand')
                return $att_value->value;
        }
        return false;
    }

    /**
     * a query for fetch key value primary attributes (primary technical specifications) of product.
     */
    public function getPrimaryAttributesAttribute()
    {
        $titles = [];
        $values = [];
        foreach ($this->att_values as $att_value) {
            if (AttTitle::find($att_value->att_title_id)->key == 'brand' or AttTitle::find($att_value->att_title_id)->is_primary == 0)
                continue;
            $titles[] = AttTitle::find($att_value->att_title_id)->title;
            $values[] = $att_value->value;
        }

        return array_combine($titles, $values);
    }

    /**
     * a query for fetch key value secondary attributes (secondary technical specifications) of product.
     */
    public function getSecondaryAttributesAttribute()
    {
        $titles = [];
        $values = [];
        foreach ($this->att_values as $att_value) {
            if (AttTitle::find($att_value->att_title_id)->key == 'brand' or AttTitle::find($att_value->att_title_id)->is_primary == 1)
                continue;
            $titles[] = AttTitle::find($att_value->att_title_id)->title;
            $values[] = $att_value->value;
        }

        return array_combine($titles, $values);
    }
}
