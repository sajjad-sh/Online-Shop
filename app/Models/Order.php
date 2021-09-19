<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    //todo: category for specification
    protected $fillable = [
        'card_id',
        'address_id',
        'status',
        'payment_method',
        'cancel_reason',
    ];
}
