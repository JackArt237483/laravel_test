@extends('layouts.app')

@section('title', 'Create Task') <!-- Заголовок страницы -->

@section('content')
    <h1>Create New Task</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <label for="title">Task Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="category">Category:</label>
        <input type="text" name="category" id="category">

        <label for="priority">Priority:</label>
        <input type="number" name="priority" id="priority" min="1" max="3" value="3">

        <button type="submit">Create Task</button>
    </form>
@endsection
