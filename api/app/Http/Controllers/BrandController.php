<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Muestra una lista de todas las marcas.
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

    /**
     * Guarda una nueva marca en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::create($request->all());

        return response()->json($brand, 201);
    }

    /**
     * Muestra una marca específica por su ID.
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return response()->json($brand);
    }

    /**
     * Actualiza una marca en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
        ]);

        $brand->update($request->all());

        return response()->json($brand);
    }

    /**
     * Elimina una marca de la base de datos.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->json(['message' => 'Marca eliminada']);
    }
}
