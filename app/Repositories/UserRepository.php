<?php
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function save(User $user): bool
    {
        return $user->save();
    }

    public function assignRoles(int $userId, array $roleIds): bool
    {
        $user = User::find($userId);
        if ($user) {
            $user->roles()->sync($roleIds); // Связь "пользователь-роли" через таблицу pivot
            return true;
        }
        return false;
    }

    public function getUserRoles(int $userId): array
    {
        $user = User::find($userId);
        return $user ? $user->roles->pluck('name')->toArray() : [];
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function updateUser(User $user): bool
    {
        return $user->save();
    }
}
