<form method="POST" action="{{ route('tasks.assignTask') }}">
    @csrf

    <div>
        <label for="user">Assign to User:</label>
        <select name="user_id" id="user" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="task">Task Title:</label>
        <input type="text" name="title" id="task" required>
    </div>

    <button type="submit">Assign Task</button>
</form>
