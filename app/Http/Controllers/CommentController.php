<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return $comments;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'solution_id' => 'required|integer|exists:solutions,id',
            'comment' => 'required|string|max:500'
        ]);

        $data['user_id'] = Auth::id();

        Comment::create($data);
        return redirect()->back()->with('success', 'Comentário enviado com sucesso!');
        /* return response()->json($comment, 201); Retirei pois essa parte é mais usada para APIs ao invés de web  */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);

        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comment.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);

        $data = $request->validate([
            'comment' => 'required|string|max:500'
        ]);

        $comment->update($data);
        return redirect()->back()->with('success', 'Comentário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
    }
}
