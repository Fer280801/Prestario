<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('books', function (Blueprint $t) {
      $t->id('book_id');
      $t->string('isbn', 20);
      $t->string('title', 120);
      $t->foreignId('publisher_id')->nullable()->constrained('publishers')->nullOnDelete()->cascadeOnUpdate();
      $t->char('lang', 2)->nullable();
      $t->smallInteger('pages')->nullable();
      $t->smallInteger('year_pub')->nullable();
      $t->unsignedBigInteger('category_id')->nullable();
      $t->unsignedBigInteger('subcategory_id')->nullable();
      $t->unsignedBigInteger('author_id')->nullable();
      $t->text('description')->nullable();
      $t->timestamps();

      $t->unique('isbn');
      $t->foreign('lang')->references('lang_code')->on('languages')->nullOnDelete()->cascadeOnUpdate();
      $t->foreign('category_id')->references('category_id')->on('categories')->nullOnDelete()->cascadeOnUpdate();
      $t->foreign('subcategory_id')->references('subcategory_id')->on('subcategories')->nullOnDelete()->cascadeOnUpdate();
      $t->foreign('author_id')->references('author_id')->on('authors')->nullOnDelete()->cascadeOnUpdate();
    });
  }
  public function down(): void { Schema::dropIfExists('books'); }
};
