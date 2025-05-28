<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $favorites = auth()->user()->favorites()->with('category')->get();
        
        return response()->json([
            'products' => $favorites,
            'count' => $favorites->count()
        ]);
    }
    
    public function destroy(Product $product)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        auth()->user()->favorites()->detach($product->id);
        
        return response()->json(['message' => 'Producto eliminado de favoritos']);
    }
}