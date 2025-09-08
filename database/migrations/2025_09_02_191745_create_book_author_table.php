<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('book_author', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            // PK compuesta
            $table->primary(['book_id', 'author_id']);

            // FKs que COINCIDEN con los nombres de PK definidos arriba
            $table->foreign('book_id')
                  ->references('book_id')->on('books')
                  ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('author_id')
                  ->references('author_id')->on('authors')
                  ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_author');
    }
};