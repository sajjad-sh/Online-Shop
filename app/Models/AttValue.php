<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttValue extends Model
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
     * The products that belong to the att_value.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'att_product', 'att_id', 'product_id')->withTimestamps()->withPivot('type');
    }

    /**
     * Get the user that owns the address.
     */
    public function att_title()
    {
        return $this->belongsTo(AttTitle::class);
    }
}
