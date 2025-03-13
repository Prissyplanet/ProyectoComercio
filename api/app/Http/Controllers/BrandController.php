<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
  
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::create($request->all());

        return response()->json($brand, 201);
    }

    
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return response()->json($brand);
    }

    
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
        ]);

        $brand->update($request->all());

        return response()->json($brand);
    }

   
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->json(['message' => 'Marca eliminada']);
    }
}
