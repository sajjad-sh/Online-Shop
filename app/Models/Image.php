<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'url',
        'is_primary'
    ];

    /**
     * Get all of the products that are assigned this image.
     */
    public function products()
    {
        return $this->morphedByMany(Product::class, 'imageable');
    }

    /**
     * Get all of the categories that are assigned this image.
     */
    public function categories()
    {
        return $this->morphedByMany(Category::class, 'imageable');
    }
}
