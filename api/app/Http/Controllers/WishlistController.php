<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    /**
     * Muestra una lista de todas las listas de deseos.
     */
    public function index()
    {
        $wishlists = Wishlist::all();
        return response()->json($wishlists);
    }

    /**
     * Guarda una nueva lista de deseos en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        $wishlist = Wishlist::create($request->all());

        return response()->json($wishlist, 201);
    }

    /**
     * Muestra una lista de deseos específica por su ID.
     */
    public function show($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return response()->json($wishlist);
    }

    /**
     * Actualiza una lista de deseos en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $wishlist = Wishlist::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
        ]);

        $wishlist->update($request->all());

        return response()->json($wishlist);
    }

    /**
     * Elimina una lista de deseos de la base de datos.
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return response()->json(['message' => 'Lista de deseos eliminada']);
    }
}
