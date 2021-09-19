<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySpecificationValue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'value'
    ];

    /**
     * The products that belong to the primary_specification_value.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_spec', 'spec_id', 'product_id');
    }
}
