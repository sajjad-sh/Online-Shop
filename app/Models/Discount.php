<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'title',
        'type',
        'amount',
        'inventory',
        'sales',
    ];

    /**
     * Get the carts for the discount.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
