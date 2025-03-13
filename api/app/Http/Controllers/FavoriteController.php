<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    /**
     * Muestra una lista de todos los favoritos.
     */
    public function index()
    {
        $favorites = Favorite::all();
        return response()->json($favorites);
    }

    /**
     * Guarda un nuevo favorito en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $favorite = Favorite::create($request->all());

        return response()->json($favorite, 201);
    }

    /**
     * Muestra un favorito específico por su ID.
     */
    public function show($id)
    {
        $favorite = Favorite::findOrFail($id);
        return response()->json($favorite);
    }

    /**
     * Elimina un favorito de la base de datos.
     */
    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();

        return response()->json(['message' => 'Favorito eliminado']);
    }
}
