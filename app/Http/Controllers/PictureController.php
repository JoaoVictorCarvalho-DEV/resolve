<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pictures = Picture::all();
        return view('picture.index', compact($pictures));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('picture.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data  = $request->validate([
            'title'=>'required|string|max:50',
            'description' => 'sometimes|string',
            'solution_id' => 'required|exists:solutions,id'
        ]);

        $path = $request->file('pictures')->store('pictures', 'public');

        $data['path'] = $path;

        Picture::create($data);

        return redirect()->back()->with('success', 'Imagem salva com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $picture = Picture::findOrFail($id);

        return view('picture.show', compact($picture));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $picture = Picture::findOrFail($id);

        return view('picture.edit', compact($picture));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $picture = Picture::findOrFail($id);
        $data  = $request->validate([
            'title'=>'required|string|max:50',
            'description' => 'sometimes|string',
            'solution_id' => 'required|exists:solutions,id'
        ]);

        $path = $request->file('pictures')->store('pictures', 'public');

        $data['path'] = $path;

        $picture->update($data);

        return redirect()->back()->with('success', 'Imagem editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $picture = Picture::findOrFail($id);

        $picture->delete();

        return redirect()->back()->with('success', 'Imagem deletada com sucesso!');
    }
}
