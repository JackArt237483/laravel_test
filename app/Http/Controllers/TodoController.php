<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Защищаем все методы от неавторизованных пользователей
    }

    // Отображение списка задач
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id()) // Только задачи, принадлежащие текущему пользователю
        ->orderBy('priority')
            ->orderByDesc('created_at')
            ->get();

        return view('todos.index', compact('todos'));
    }

    // Отображение формы для создания новой задачи
    public function create()
    {
        return view('todos.create');
    }

    // Сохранение новой задачи
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string',
            'priority' => 'nullable|integer|min:1|max:3',
        ]);

        Todo::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'category' => $request->category,
            'priority' => $request->priority ?? 3,
        ]);

        return redirect()->route('todos.index');
    }

    // Обновление задачи
    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo); // Проверка с помощью политики

        $todo->update($request->only(['title', 'category', 'priority']));

        return redirect()->route('todos.index');
    }

    // Изменение статуса задачи (выполнена/не выполнена)
    public function toggle(Todo $todo)
    {
        $this->authorize('update', $todo); // Проверка с помощью политики

        $todo->update(['is_completed' => !$todo->is_completed]);

        return redirect()->route('todos.index');
    }

    // Удаление задачи
    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo); // Проверка с помощью политики

        $todo->delete();

        return redirect()->route('todos.index');
    }
}
