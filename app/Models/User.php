<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'current_cart_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'role',
        'latest_categories',
        'latest_products',
        'favorite_products',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # TODO: Check Relation Comments
    # TODO: Add return and param in comments and add their signatures
    /**
     * Get the cart that owns the user.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the payments for the user.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the payments for the user.
     */
    public function products()
    {
        return $this->hasMany(Product::class)->withTrashed();
    }

    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the addresses for the user.
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFavoritesAttribute()
    {
        return json_decode($this->favorite_products) ?? array();
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isStoreKeeper()
    {
        return $this->hasRole('storekeeper');
    }

    public function isWriter()
    {
        return $this->hasRole('writer');
    }
}
