<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Import your Task model

class TaskController extends Controller
{
    public function create()
    {
        return view('tasks.create'); // Return the view for creating a task
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'required|string|in:low,medium,high',
        ]);

        // Create a new task
        Task::create($request->all());

        // Redirect back to the task creation page with a success message
        return redirect()->route('tasks.create')->with('success', 'Task created successfully!');
    }

    public function index()
    {
        $tasks = Task::all(); // Retrieve all tasks from the database
        return view('tasks.index', compact('tasks')); // Pass tasks to the view
    }

    public function assignForm($id)
{
    $task = Task::findOrFail($id); // Retrieve the task to be assigned
    $users = User::all(); // Get the list of users

    return view('tasks.assign', compact('task', 'users'));
}

public function assign(Request $request, $id)
{
    $task = Task::findOrFail($id);

    // Validate the user ID
    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    // Assign the user to the task
    $task->user_id = $request->user_id;
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task assigned successfully!');
}

}
