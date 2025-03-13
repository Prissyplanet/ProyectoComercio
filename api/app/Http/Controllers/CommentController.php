<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
 
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

  
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

   
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

 
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $request->validate([
            'comment' => 'string',
        ]);

        $comment->update($request->all());

        return response()->json($comment);
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comentario eliminado']);
    }
}
