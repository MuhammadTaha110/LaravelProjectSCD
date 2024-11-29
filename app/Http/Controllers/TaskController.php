<?php

namespace App\Http\Controllers;
use App\Models\User; 


use Illuminate\Http\Request;
use App\Models\Task; // Import your Task model

class TaskController extends Controller
{
    public function create()
    {
        $users = User::all(); // Retrieve all users
        return view('tasks.create', compact('users')); // Compact automatically creates an array with 'users' => $users
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'priority' => 'required|string|in:low,medium,high',
        'user_id' => 'nullable|exists:users,id', // Validate that user_id exists in the users table
    ]);

    // Create the task (mass assignment)
    $task = Task::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'due_date' => $validated['due_date'],
        'priority' => $validated['priority'],
    ]);

    // Check if the user_id exists in the request and assign the user to the task
    if (isset($validated['user_id']) && $validated['user_id']) {
        $task->user_id = $validated['user_id'];
        $task->save();  // Save the task with the assigned user
    }

    // Redirect back to the task list page with a success message
    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
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

public function edit($id)
{
    // Retrieve the task by ID
    $task = Task::findOrFail($id);
    
    // Retrieve all users for the dropdown
    $users = User::all();
    
    // Pass the task and users to the view
    return view('tasks.edit', compact('task', 'users'));
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'priority' => 'required|in:low,medium,high',
        'user_id' => 'nullable|exists:users,id', // Validate that user_id exists in the users table
    ]);

    // Find the task by ID
    $task = Task::findOrFail($id);

    // Update the task with the validated data
    $task->title = $validated['title'];
    $task->description = $validated['description'];
    $task->due_date = $validated['due_date'];
    $task->priority = $validated['priority'];
    $task->user_id = $validated['user_id'] ?? null; // If user_id is not set, keep it null

    // Save the updated task
    $task->save();

    // Redirect back to the task list with a success message
    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
}


public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
}


public function assign(Request $request, $taskId)
{
    $task = Task::findOrFail($taskId);

    // Validate the request to ensure a valid user is selected
    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    // Assign the user to the task
    $task->user_id = $request->user_id;
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task assigned successfully.');
}

public function showAssignForm($taskId)
{
    $task = Task::findOrFail($taskId);
    $users = User::all();

    return view('tasks.assign', compact('task', 'users'));
}

}
