<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * Display a listing of the solution.
     */
    public function index()
    {
        return $solution = Solution::all();
    }

    /**
     * Show the form for creating a new solution.
     */
    public function create(Request $request)
    {
        return view('solution.create');
    }

    /**
     * Store a newly created solution in storage.
     */
    public function store(Request $request)
    {
        $atributos = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'sometimes|string',
            'code_snippet'  => 'sometimes|string',
            'user_id'       => 'required|exists:users,id'
        ]);

        $solution = Solution::create($atributos);

        /* return response()->json($solution, 201); */
        return redirect()->back()->with('success', 'Solução criada com sucesso!');
    }

    /**
     * Display the specified solution.
     */
    public function show(string $id)
    {
        return Solution::find($id);
    }

    /**
     * Show the form for editing the specified solution.
     */
    public function edit(string $id)
    {
        $solution = Solution::findOrFail($id);

        return view('solution.edit', $solution);
    }

    /**
     * Update the specified solution in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title'         => 'sometimes|string|max:255',
            'description'   => 'sometimes|string',
            'code_snippet'  => 'sometimes|string',
        ]);

        $solution = Solution::findOrFail($id);

        $solution->update($data);

        /* return response()->json($solution, 200); */
        return redirect()->back()->with('success', 'Solução editada com sucesso!') ;
    }

    /**
     * Remove the specified solution from storage.
     */
    public function destroy(string $id)
    {
        $solution = Solution::find(1);
        $solution->delete();

    }
}
