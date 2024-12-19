<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;

class TodoPolicy
{
    /**
     * Определить, может ли пользователь обновлять задачу.
     */
    public function update(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id; // Разрешаем обновление только владельцу задачи
    }

    /**
     * Определить, может ли пользователь удалить задачу.
     */
    public function delete(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id; // Разрешаем удаление только владельцу задачи
    }
}
