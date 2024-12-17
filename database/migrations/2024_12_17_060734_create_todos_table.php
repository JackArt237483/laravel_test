<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY
            $table->string('title'); // Название задачи
            $table->boolean('is_completed')->default(false); // Статус задачи
            $table->string('category')->default('Общее'); // Категория задачи
            $table->integer('priority')->default(3); // Приоритет задачи
            $table->unsignedBigInteger('user_id'); // Внешний ключ пользователя
            $table->timestamps(); // created_at и updated_at

            // Внешний ключ на users(id)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('todos');
    }
};
