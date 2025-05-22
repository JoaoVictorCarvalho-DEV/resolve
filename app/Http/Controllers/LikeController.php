<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likes = Like::all();
        $count = Like::count();
        $data = [
            'count' => $count,
            'likes' => $likes
        ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('like.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Receber os dados(e tratar) */
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'solution_id' => 'required|integer|exists:solutions,id',
        ]);

        /* criar o objeto */
        $like = Like::create($data);

        /* Retornar resposta */
        return redirect()->back()->with('success', 'Like adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $like = Like::findOrFail($id);
        return $like;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $like = Like::findOrFail($id);
        return view('like.edit', ['like' => $like]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /* Encontrar o dado like */
        $like = Like::findOrFail($id);

        /* Receber os dados(e tratar) */
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'solution_id' => 'required|integer|exists:solutions,id'
        ]);

        /* Editar */
        $like->update($data);

        /* Retornar a resposta */
        return redirect()->back()->with('success', 'Like editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $like = Like::findOrFail($id);
        $like->delete();
    }
}
