<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'affiliate_link',
        'category_id',
        'brand_id',
    ];

    // Relación con la categoría (muchos a uno)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con la marca (muchos a uno)
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relación con los comentarios (uno a muchos)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relación con los favoritos (uno a muchos)
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Relación con las reviews (uno a muchos)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Relación muchos a muchos con tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
}
