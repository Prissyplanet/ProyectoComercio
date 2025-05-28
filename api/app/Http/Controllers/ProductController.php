<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();
        return view('admin.products', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product_create', compact('categories', 'brands'));
    }
   public function apiIndex(Request $request)
{
    $query = Product::with(['category', 'brand']);

    if ($request->has('category_id')) {
        $query->where('category_id', $request->category_id);
    }
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%")
              ->orWhereHas('category', function($cat) use ($search) {
                $cat->where('name', 'like', "%$search%");
              });

        });
    }
    return $query->get();
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

   public function apiShow($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($product);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product_edit', compact('product', 'categories', 'brands'));
    }


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


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
    }

}
