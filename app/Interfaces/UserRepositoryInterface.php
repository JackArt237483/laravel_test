<?php
namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findByEmail(string $email): ?User; // Найти пользователя по email
    public function save(User $user): bool; // Сохранить пользователя
    public function assignRoles(int $userId, array $roleIds): bool; // Назначить роли пользователю
    public function getUserRoles(int $userId): array; // Получить роли пользователя
    public function findById(int $id): ?User; // Найти пользователя по ID
    public function updateUser(User $user): bool; // Обновить пользователя
}

?>
