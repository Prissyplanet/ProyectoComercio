<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Muestra una lista de todos los comentarios.
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    /**
     * Guarda un nuevo comentario en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string',
        ]);

        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }

    /**
     * Muestra un comentario específico por su ID.
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

    /**
     * Actualiza un comentario en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $request->validate([
            'comment' => 'string',
        ]);

        $comment->update($request->all());

        return response()->json($comment);
    }

    /**
     * Elimina un comentario de la base de datos.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comentario eliminado']);
    }
}
