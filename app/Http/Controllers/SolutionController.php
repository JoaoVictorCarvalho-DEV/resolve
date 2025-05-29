<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{
    /**
     * Display a listing of the solution.
     */
    public function index()
    {
        $solutions = Solution::all();
        return view('solution.index', compact('solutions'));
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
        $data = $request->validate([
            'title'                 => 'required|string|max:255',
            'description'           => 'sometimes|string',
            'code_snippets'         => 'nullable|array',
            'code_snippets.*.title' => 'required|string', // Valida cada título
            'code_snippets.*.code'  => 'required|string',
        ]);//validate é bem silencioso ao dar algo errado...

        $data['user_id'] = Auth::id();

        $solution = Solution::create($data);

        if ($request->has('code_snippets')) {
            foreach ($request->input('code_snippets') as $codeSnippet) {
                $solution->codeSnippets()->create($codeSnippet);

            }
        }

        /* return response()->json($solution, 201); */
        return redirect()->back()->with('success', 'Solução criada com sucesso!');
    }

    /**
     * Display the specified solution.
     */
    public function show(string $id)
    {
        $solution = Solution::findOrFail($id);
        return view('solution.show', compact('solution'));
    }

    /**
     * Show the form for editing the specified solution.
     */
    public function edit(string $id)
    {
        $solution = Solution::findOrFail($id);

        return view('solution.edit', compact(['solution']));
    }

    /**
     * Update the specified solution in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title'         => 'sometimes|string|max:255',
            'description'   => 'sometimes|string',
        ]);

        $solution = Solution::findOrFail($id);

        $solution->update($data);

        /* return response()->json($solution, 200); */
        return redirect()->back()->with('success', 'Solução editada com sucesso!');
    }

    /**
     * Remove the specified solution from storage.
     */
    public function destroy(string $id)
    {
        $solution = Solution::findOrFail($id);
        $solution->delete();
        return redirect()->back()->with('success', 'Solução deletada com sucesso!');
    }
}
