<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $t) {
            $t->id('book_id');                            // PK correcto
            $t->string('isbn', 20)->unique();
            $t->string('title', 120);

            // Llaves foráneas (coinciden con los PK arriba):
            $t->unsignedBigInteger('lang_id')->nullable();
            $t->unsignedBigInteger('publishers_id')->nullable();
            $t->unsignedBigInteger('category_id')->nullable();
            $t->unsignedBigInteger('subcategory_id')->nullable(); // si usas jerarquía en categories

            $t->smallInteger('pages')->nullable();
            $t->smallInteger('year_pub')->nullable();
            $t->text('description')->nullable();
            $t->timestamps();

            // FKs
            $t->foreign('lang_id')
              ->references('lang_id')->on('languages')
              ->nullOnDelete()->cascadeOnUpdate();

            $t->foreign('publishers_id')
              ->references('publishers_id')->on('publishers')
              ->nullOnDelete()->cascadeOnUpdate();

            $t->foreign('category_id')
              ->references('category_id')->on('categories')
              ->nullOnDelete()->cascadeOnUpdate();

            $t->foreign('subcategory_id')
              ->references('category_id')->on('categories')
              ->nullOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};