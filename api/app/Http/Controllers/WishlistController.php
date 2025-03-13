<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    
    public function index()
    {
        $wishlists = Wishlist::all();
        return response()->json($wishlists);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        $wishlist = Wishlist::create($request->all());

        return response()->json($wishlist, 201);
    }

    
    public function show($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return response()->json($wishlist);
    }

  
    public function update(Request $request, $id)
    {
        $wishlist = Wishlist::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
        ]);

        $wishlist->update($request->all());

        return response()->json($wishlist);
    }


    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return response()->json(['message' => 'Lista de deseos eliminada']);
    }
}
