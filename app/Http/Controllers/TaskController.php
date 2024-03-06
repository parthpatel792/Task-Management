<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category; // Assuming you use categories

class TaskController extends Controller
{
    // Display a listing of the tasks.
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task.
    public function create()
    {
        $categories = Category::all(); // Assuming category selection is needed
        return view('tasks.create', compact('categories'));
    }

    // Store a newly created task in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:low,medium,high',
            'category_id' => 'required|exists:categories,id',
            'due_date' => 'required|date',
        ]);
    
        $task = new Task();
        $task->fill($validatedData);
        $task->user_id = auth()->id(); // Assuming tasks are related to users
        $task->save();
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Display the specified task.
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show the form for editing the specified task.
    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    // Update the specified task in storage.
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:low,medium,high',
            'category_id' => 'required|exists:categories,id',
            'due_date' => 'required|date',
        ]);
    
        $task->update($validatedData);
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Remove the specified task from storage.
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

