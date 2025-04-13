<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = session('todos', []);

        return view('todo.index', compact('todos'));
    }

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
            'completed' => false,
        ]);

        // Store the updated task back in the session
        session(['todos' => $todos]); 

        return redirect()->route('todo.index');

    }

    public function edit($index)
    {
        $todos = session('todos', []);
        $task = $todos[$index] ?? null;

        if (!$task) {
            return redirect('/');
        }

        return view('todo.edit', ['task' => $task, 'index' => $index]);
    }

    public function update(Request $request, $index)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);
    
        $todos = session('todos', []);
        if (isset($todos[$index])) {
            $todos[$index]['task'] = $request->input('task');
            $todos[$index]['description'] = $request->input('description');
            session(['todos' => $todos]);
        }
    
        return redirect('/');
    }

    public function destroy($index)
    {
        $todos = session('todos', []);
        if (isset($todos[$index])) {
            unset($todos[$index]);
            $todos = array_values($todos); 
            session(['todos' => $todos]);
        }
        return redirect('/');
    }

    public function toggleComplete($index)
    {
        $todos = session('todos', []);
        
        if (isset($todos[$index])) {
            $todos[$index]['completed'] = !$todos[$index]['completed'];
            session(['todos' => $todos]);
        }

        return redirect()->route('todo.index');
    }

}
