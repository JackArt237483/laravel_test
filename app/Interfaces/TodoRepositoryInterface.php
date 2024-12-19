<?php
namespace App\Interfaces;

interface TodoRepositoryInterface
{
    public function getAllByUserId(int $userId): array; // Получить все задачи пользователя
    public function create(array $data): void; // Создать задачу
    public function update(int $id, array $data): void; // Обновить задачу
    public function delete(int $id): void; // Удалить задачу
    public function getById(int $id): ?array; // Получить задачу по ID
}

// ОПИСЫВАЕТ МЕТОДЫ ДЛЯ РАБОТЫ В РЕПОЗИТОРИЯХ
?>
