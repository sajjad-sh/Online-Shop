<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'name',
        'description',
        'icon'
    ];

    /**
     * The products that belong to the category.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the parent_category that owns the category.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the sub-categories for the category.
     */
    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get all of the images for the category.
     */
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower($value);
    }


    /**
     * Get count of the Category parent(s).
     */
    public static function countCategoryParent(Category $category)
    {
        $count = -1;

        do {
            $category = $category->parent;
            $count++;
        } while (!is_null($category));

        return $count;
    }

    public static function hasChildren(Category $category)
    {
        return ($category->childrens()->get()->first()) ? true : false;
    }
}
