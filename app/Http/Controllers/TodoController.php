<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'task' => 'required|string|max:255', 
            'description' => 'nullable|string',
        ]);

        $task = $request->input('task'); 
        $description = $request->input('description');
        $todos = session('todos', []);

        // Make sure the latest task is on top
        array_unshift($todos, [
            'task' => $task,
            'description' => $description,
            'created_at' => now()->toDateTimeString(),
        ]);

        // Store the updated task back in the session
        session(['todos' => $todos]); 

        return redirect()->route('todo.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
