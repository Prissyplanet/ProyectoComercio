<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
    ];

    // Relación con el usuario (muchos a uno)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el producto (muchos a uno)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
