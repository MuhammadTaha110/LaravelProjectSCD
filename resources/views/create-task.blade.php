<!-- resources/views/services.blade.php -->
@extends('layout')

@section('title', 'Services')

@section('content')
<div class="container">
        <h1>Add New Task</h1>
        
        <form action="/tasks" method="POST" id="taskForm">
            @csrf
            <div class="form-group">
                <label for="title">Task Title*</label>
                <input type="text" id="title" name="title" required>
                <div class="error" id="titleError">Please enter a task title</div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date*</label>
                <input type="datetime-local" id="due_date" name="due_date" required>
                <div class="error" id="dueDateError">Please select a due date</div>
            </div>

            <div class="form-group">
                <label>Priority*</label>
                <div class="priority-options">
                    <div class="priority-option">
                        <input type="radio" id="low" name="priority" value="low" required>
                        <label for="low">Low</label>
                    </div>
                    <div class="priority-option">
                        <input type="radio" id="medium" name="priority" value="medium">
                        <label for="medium">Medium</label>
                    </div>
                    <div class="priority-option">
                        <input type="radio" id="high" name="priority" value="high">
                        <label for="high">High</label>
                    </div>
                </div>
                <div class="error" id="priorityError">Please select a priority level</div>
            </div>

            <div class="form-group">
                <label for="status">Status*</label>
                <select id="status" name="status" required>
                    <option value="">Select Status</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
                <div class="error" id="statusError">Please select a status</div>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="">Select Category</option>
                    <option value="work">Work</option>
                    <option value="personal">Personal</option>
                    <option value="shopping">Shopping</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <button type="submit">Create Task</button>
        </form>
    </div>

    <script>
        document.getElementById('taskForm').addEventListener('submit', function(e) {
            let hasError = false;
            
            // Reset errors
            document.querySelectorAll('.error').forEach(error => {
                error.style.display = 'none';
            });

            // Validate title
            if (!document.getElementById('title').value.trim()) {
                document.getElementById('titleError').style.display = 'block';
                hasError = true;
            }

            // Validate due date
            if (!document.getElementById('due_date').value) {
                document.getElementById('dueDateError').style.display = 'block';
                hasError = true;
            }

            // Validate priority
            if (!document.querySelector('input[name="priority"]:checked')) {
                document.getElementById('priorityError').style.display = 'block';
                hasError = true;
            }

            // Validate status
            if (!document.getElementById('status').value) {
                document.getElementById('statusError').style.display = 'block';
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
            }
        });
    </script>
@endsection
