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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');            // Заголовок новини
            $table->string('slug')->unique();   // ЧПУ посилання (напр. nova-postavka-tsegli)
            $table->text('content');            // Текст новини
            $table->string('image')->nullable(); // Головне фото
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->useCurrent(); // Дата публікації
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
