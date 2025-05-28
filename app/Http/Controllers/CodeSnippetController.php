<?php

namespace App\Http\Controllers;

use App\Models\CodeSnippet;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\CodeUnit;

class CodeSnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codeSnippets = CodeSnippet::all();

        return view('code_snippet.index', compact($codeSnippets));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('code_snippet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:50',
            'code'=> 'required|string|',
            'solution_id' => 'exists:solutions,id'
        ]);

        CodeSnippet::create($data);

        return redirect()->back()->with('success', 'Código criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CodeSnippet::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $codeSnippet = CodeSnippet::findOrFail($id);

        return view('code_snippet.edit', compact($codeSnippet));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $codeSnippet = CodeSnippet::findOrFail($id) ;
        $data = $request->validate([
            'title' => 'required|string|max:50',
            'code'=> 'required|string|',
            'solution_id' => 'exists:solutions,id'
        ]);

        $codeSnippet->update($data);

        return redirect()->back()->with('success','Código editado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $codeSnippet = CodeSnippet::findOrFail($id);
        $codeSnippet->delete();

        return redirect()->back()->with('success', 'Código deletado com sucesso!');
    }
}
