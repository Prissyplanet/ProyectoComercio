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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

 
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

  
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

   
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

  
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
}
