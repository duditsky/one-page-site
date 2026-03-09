<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');      // Ім'я клієнта
            $table->string('client_status')->nullable(); // Напр: "Приватне будівництво" або "ОСББ"
            $table->text('text');               // Текст відгуку
            $table->unsignedTinyInteger('rating')->default(5); // Рейтинг 1-5
            $table->string('photo')->nullable(); // Фото клієнта (опціонально)
            $table->boolean('is_moderated')->default(false); // Показувати лише після перевірки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
