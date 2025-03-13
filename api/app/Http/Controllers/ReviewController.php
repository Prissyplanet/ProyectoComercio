<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Muestra una lista de todas las reseñas.
     */
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }

    /**
     * Guarda una nueva reseña en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $review = Review::create($request->all());

        return response()->json($review, 201);
    }

    /**
     * Muestra una reseña específica por su ID.
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);
        return response()->json($review);
    }

    /**
     * Actualiza una reseña en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'rating' => 'integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $review->update($request->all());

        return response()->json($review);
    }

  
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json(['message' => 'Reseña eliminada']);
    }
}
