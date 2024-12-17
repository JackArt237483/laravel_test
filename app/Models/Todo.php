<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'user_id',
        'category',
        'priority',
        'is_completed',
    ];
    // массив, который указывает, какие поля модели можно массово заполнять
}
?>
