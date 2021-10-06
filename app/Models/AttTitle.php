<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

# TODO: Change Specification to Attriubute
class AttTitle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'title'
    ];

    /**
     * Get the att_values for the att_titles.
     */
    public function att_values()
    {
        return $this->hasMany(AttValue::class);
    }
}
