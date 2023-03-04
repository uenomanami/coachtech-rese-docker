<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'permission_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    public function favorite_stores()
    {
        return $this->belongsToMany('App\Models\Store', 'favorites', 'user_id', 'store_id');
    }

    public function is_favorite($store_id)
    {
        return $this->favorites()->where('store_id', $store_id)->exists();
    }

    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }

    public function is_reserve($store_id)
    {
        return $this->reserves()->where('store_id', $store_id)->exists();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function is_comment($store_id, $user_id)
    {
        return $this->comments()->where('store_id', $store_id)->where('user_id', $user_id)->exists();
    }
}
