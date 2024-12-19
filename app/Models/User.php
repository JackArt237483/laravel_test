<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Указываем, что эта модель использует таблицу "users"
    protected $table = 'users';

    // Указываем, какие атрибуты можно массово заполнять (mass assignable)
    protected $fillable = ['username', 'email', 'phone', 'password'];

    // Определение связи "многие ко многим" с таблицей roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    // Маска пароля (для безопасного хранения)
    protected $hidden = ['password'];
}
