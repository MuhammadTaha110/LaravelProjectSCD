@extends('layout')

@section('content')
<div class="container">
    <h1>Assign Task: {{ $task->title }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tasks.assign', $task->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Assign to User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select a user</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Assign Task</button>
    </form>
</div>
@endsection
