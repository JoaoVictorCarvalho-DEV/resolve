<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

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
            'videos'                => 'nullable|array',
            'videos.*.title'        => 'required_with:videos|string|max:50',
            'videos.*.description'  => 'nullable|string',
            'videos.*.file'         => 'required_with:videos|file|mimetypes:video/mp4,video/x-msvideo,video/quicktime|max:51200',
            'pictures'              => 'nullable|array',
            'picutes.*.title'       => 'required_with:pictures|string|max:50',
            'pictures.*.description'=> 'nullable|string',
            'pictures.*.file'       => 'required_with:pictures|image|max:51200'

        ]);//validate é bem silencioso ao dar algo errado...
        $data['user_id'] = Auth::id();

        $solution = Solution::create($data);

        if ($request->has('code_snippets')) {
            foreach ($request->input('code_snippets') as $codeSnippet) {
                $solution->codeSnippets()->create($codeSnippet);
            }
        }

        //Todo
        //1 - Check if has files
        if($request->has('videos')){
            //a - Iterate all files
            foreach($request->videos as $video){
                //a.1 - Pick the file path and store it
                $path = $video['file']->store('videos', 'public');

                //a.2 - Create and associate the file at the solution
                $solution->videos()->create([
                    'title' => $video['title'],
                    'description' => $video['description'] ?? "",
                    'path' => $path
                ]);
            }

        }

        if($request->has('pictures')){
            foreach($request->pictures as $picture){
                $path = $picture['file']->store('pictures', 'public');

                $solution->pictures()->create([
                    'title' => $picture['title'],
                    'description' => $picture['description'] ?? "",
                    'path' => $path
                ]);
            }
        }

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

        $solution = Solution::findOrFail($id);

        if($request->user()->cannot('update',$solution)){
            return redirect()->back()->with('error','Você não tem permissão para alterar essa solução.');
        }

        $data = $request->validate([
            'title'         => 'sometimes|string|max:255',
            'description'   => 'sometimes|string',
        ]);



        /* Gate::authorize('update', $solution); */

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
