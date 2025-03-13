<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Muestra una lista de todas las etiquetas.
     */
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    /**
     * Guarda una nueva etiqueta en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        $tag = Tag::create($request->all());

        return response()->json($tag, 201);
    }

    /**
     * Muestra una etiqueta específica por su ID.
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

    /**
     * Actualiza una etiqueta en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255|unique:tags,name,' . $id,
        ]);

        $tag->update($request->all());

        return response()->json($tag);
    }

    /**
     * Elimina una etiqueta de la base de datos.
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json(['message' => 'Etiqueta eliminada']);
    }
}
