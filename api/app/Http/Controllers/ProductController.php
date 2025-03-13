<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Muestra una lista de todos los productos en la vista de administración.
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();
        return view('admin.products', compact('products'));
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     */

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product_create', compact('categories', 'brands'));
    }
     
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
            'affiliate_link' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Muestra un producto específico por su ID.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_show', compact('product'));
    }

    /**
     * Muestra el formulario de edición de un producto.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product_edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
            'affiliate_link' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
        ]);
        

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
    }

}
