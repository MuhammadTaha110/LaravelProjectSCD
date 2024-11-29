@extends('layout')

@section('content')
<div class="container">
    <h2 class="text-black">Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select id="priority" name="priority" class="form-control">
                <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Assign User</label>
            <select id="user_id" name="user_id" class="form-control">
                <option value="">Unassigned</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id === $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="py-4">
            <button type="submit" class="btn btn-success">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
