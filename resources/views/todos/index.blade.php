@extends('layouts.app')

@section('title', 'Task List') <!-- Заголовок страницы -->

@section('content')
    <h1>ToDo List</h1>

    <!-- Форма для добавления новой задачи -->
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="New Task" required>
        <input type="text" name="category" placeholder="Category">
        <input type="number" name="priority" placeholder="Priority" min="1" max="3" value="3">
        <button type="submit">Add</button>
    </form>

    <!-- Список задач -->
    <ul>
        @forelse ($todos as $todo)
            <li>
                {{ $todo->title }} - {{ $todo->category ?? 'No Category' }} - Priority: {{ $todo->priority }}
                @if ($todo->is_completed)
                    <span>✔ Completed</span>
                @else
                    <form action="{{ route('todos.toggle', $todo) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Mark as Completed</button>
                    </form>
                @endif
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @empty
            <p>No tasks available.</p>
        @endforelse
    </ul>
@endsection
