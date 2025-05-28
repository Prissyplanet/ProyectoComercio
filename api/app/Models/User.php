<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage; 
use App\Models\Product;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',       
        'avatar',    
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = ['avatar_url'];

   
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/avatars/'.$this->avatar);
        }
        return asset('images/logo.png'); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id');
    }

  
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

   
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            if ($user->avatar) {
                Storage::delete('public/avatars/'.$user->avatar);
            }
        });
    }
}