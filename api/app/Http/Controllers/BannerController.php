<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Muestra una lista de todos los banners.
     */
    public function index()
    {
        $banners = Banner::all();
        return response()->json($banners);
    }

    /**
     * Guarda un nuevo banner en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
            'link' => 'nullable|url'
        ]);

        $banner = Banner::create($request->all());

        return response()->json($banner, 201);
    }

    /**
     * Muestra un banner específico por su ID.
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return response()->json($banner);
    }

    /**
     * Actualiza un banner en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'string|max:255',
            'image_url' => 'url',
            'link' => 'nullable|url'
        ]);

        $banner->update($request->all());

        return response()->json($banner);
    }

    /**
     * Elimina un banner de la base de datos.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return response()->json(['message' => 'Banner eliminado']);
    }
}
