<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller {
    public function index(){ // отображение всех задач
        $todos = Todo::where('user_id',Auth::id())->orderBy('priority')->orderByDesc('created_at')->get();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string',
            'priority' => 'nullable|integer|min:1|max:2',
        ]); // валидация запроса

        Todo::create([
            'title' => $request->title,
            'user_id' => Auth::id(), // id текущего авторизованного пользователя
            'category' => $request->category,
            'priority' => $request->priority ?? 3,
        ]);// создание задачи
        return redirect()->route('todos.index');
    }
    public function update(Request $request,Todo $todo) {
        $this->authorize('update', $todo); // проверка прав доступа

        $todo->update($request->only(['title','category','priority']));

        return redirect()->route('todos.index');
    }
    public function toggle(Todo $todo){
        $this->authorize('update',$todo);

        $todo->update(['is_completed' => !$todo->is_completed]);

        return redirect()->route('todos.index');
    }
    public function destroy(Todo $todo){
        $this->authorize('delete',$todo);

        $todo->delete();

        return redirect()->route('todos.index');
    }
}
