<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'content', 'is_verify', 'likes', 'dislikes'
    ];

    protected $observables = [
      'verified'
    ];

    public function makeVerify()
    {
        $this->is_verify = 1;
        $this->cancel_reason = '';
        $this->save();

        $this->fireModelEvent('verified', false);
    }

    public function makeUnverify($cancel_reason)
    {
        $this->is_verify = 2;
        $this->cancel_reason = $cancel_reason;
        $this->save();

        $this->fireModelEvent('unverified', false);
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     * Get the product that owns the comment.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
