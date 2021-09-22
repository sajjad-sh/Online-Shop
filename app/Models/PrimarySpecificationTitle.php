<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimarySpecificationTitle extends Model
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
     * Get the primary_specification_values for the primary_specification_titles.
     */
    public function primary_specification_values()
    {
        return $this->hasMany(PrimarySpecificationValue::class, 'spec_title_id');
    }
}
