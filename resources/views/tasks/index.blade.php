@extends('layout')

@section('content')
<div class="container view-task">
    <h1 class="view-task-heading">Task List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($tasks->isEmpty())
        <p>No tasks found.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <!-- <th>Description</th> -->
                        <th>Due</th>
                        <th>Priority</th>
                        <th>Assigned</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="task-title">{{ $task->title }}
                                <p class="description">{{ $task->description }}</p>
                            </td>
                            <!-- <td>{{ $task->description }}</td> -->
                            <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}</td>
                            <td>
                                <span class="priority-label {{ strtolower($task->priority) }}">
                                    {{ ucfirst($task->priority) }}
                                </span>
                            </td>
                            <td>{{ $task->user ? $task->user->name : 'Unassigned' }}</td>
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
