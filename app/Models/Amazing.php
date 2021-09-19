<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amazing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type',
        'amount',
        'ending_time'
    ];

    /**
     * The products that belong to the amazing.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
