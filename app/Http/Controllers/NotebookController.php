<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NotebookController extends Controller
{
    public function index(Request $request)
    {
        $notebooks = $request->user()->notebooks()->withCount('notes')->orderBy('name')->get();

        return view('notebooks.index', compact('notebooks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', Rule::unique('notebooks')->where('user_id', $request->user()->id)],
        ]);
        $request->user()->notebooks()->create($data);

        return redirect()->route('notebooks.index')->with('success', 'Notebook created. Give your learning a home.');
    }
}
