<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'password',
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
        'password' => 'hashed',
    ];

    // Relación con Comments (un usuario puede hacer muchos comentarios)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relación con Favorites (un usuario puede tener muchos favoritos)
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Relación con Reviews (un usuario puede hacer muchas reseñas)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Relación con Wishlist (un usuario puede tener muchas listas de deseos)
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
