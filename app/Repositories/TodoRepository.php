<?php
namespace App\Repositories;

use App\Interfaces\TodoRepositoryInterface;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function getAllByUserId(int $userId): array
    {
        return Todo::where('user_id', $userId)->get()->toArray();
    }

    public function create(array $data): void
    {
        Todo::create($data);
    }

    public function update(int $id, array $data): void
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->update($data);
        }
    }

    public function delete(int $id): void
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
        }
    }

    public function getById(int $id): ?array
    {
        $todo = Todo::find($id);
        return $todo ? $todo->toArray() : null;
    }
}
