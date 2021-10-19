<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'id',
        'fa_title',
        'en_title',
        'amazing_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
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
        return $this->belongsToMany(AttValue::class, 'att_product', 'product_id', 'att_id')->withTimestamps()->withPivot('type');
    }

    public static function calculateDiscount($type, $amount, $price)
    {
        if ($type == 0)
            return $price - ($amount / 100 * $price);

        return $price - $amount;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower(str_replace(' ', '-', "$value"));
    }

    # TODO: use accessor for user defined function and instead of query in blade
    /**
     * a query for fetch brand of product.
     */
    public function getBrandAttribute()
    {
        foreach ($this->att_values as $att_value) {
            if (AttTitle::find($att_value->att_title_id)->key == 'brand')
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
            if (AttTitle::find($att_value->att_title_id)->key == 'brand' or $att_value->pivot->type == 0 or $att_value->pivot->type == 3)
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
            if (AttTitle::find($att_value->att_title_id)->key == 'brand' or $att_value->pivot->type == 1 or $att_value->pivot->type == 3)
                continue;
            $titles[] = AttTitle::find($att_value->att_title_id)->title;
            $values[] = $att_value->value;
        }

        return array_combine($titles, $values);
    }

    /**
     * get count of specific product comments.
     */
    public function getCountCommentsAttribute()
    {
        return $this->loadCount('comments')->comments_count;
    }

    /**
     * get count of specific product comments.
     */
    public function getRelatedProductsAttribute()
    {
        $products = array();
//        $result = array();
        foreach ($this->categories as $category)
            $products[] = $category->products;

//        foreach ($products as $product)
//            $result[] = array_merge($product);


        return $products;
    }

    public function getSelectiveAttributesAttribute()
    {
        $selective_attributes = array();

        foreach ($this->att_values as $att_value) {
            if ($att_value->pivot->type == 3) {
                $att_title = AttTitle::find($att_value->att_title_id)->title;
                $att_title_id = AttTitle::find($att_value->att_title_id)->id;

                $selective_attributes[$att_value->id][] = $att_value->value;
                $selective_attributes[$att_value->id][] = $att_title_id;
                $selective_attributes[$att_value->id][] = $att_title;
            }
        }

        return $selective_attributes;
    }

    /**
     * get count of specific product comments.
     */
    public function getSelectiveAttributesIdAttribute()
    {
        $selective_attributes = array();

        foreach ($this->att_values as $att_value) {
            if ($att_value->pivot->type == 3) {
                $att_title_id = AttTitle::find($att_value->att_title_id)->id;
                $selective_attributes[$att_title_id][] = $att_value->id;
            }
        }

        return $selective_attributes;
    }

    public function getSelectiveAttributesNameAttribute()
    {
        $selective_attributes = array();

        foreach ($this->att_values as $att_value) {
            if ($att_value->pivot->type == 3) {
                $att_title = AttTitle::find($att_value->att_title_id)->title;
                $selective_attributes[$att_title][] = $att_value->value;
            }
        }

        return $selective_attributes;
    }

    public function getPrimaryImageAttribute()
    {
        foreach ($this->images as $image) {
            if($image->is_primary == 1)
                return $image->url;
        }
        return false;
    }

    public function getIsFavoriteAttribute()
    {
        $favorite_products = json_decode(Auth::user()->favorite_products) ?? array();

        if(array_search($this->id, $favorite_products) === false)
            return false;
        return true;
    }

    public function getIsInventoryAttribute()
    {
        if($this->inventory == 0 or $this->status == 0)
            return true;
        return false;
    }
}
