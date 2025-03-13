<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    // Relación con el usuario (una wishlist pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a muchos con Product a través de wishlist_product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'wishlist_product');
    }
}
