<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('book_author', function (Blueprint $t) {
      $t->unsignedBigInteger('book_id');
      $t->unsignedBigInteger('author_id');

      $t->primary(['book_id','author_id']);
      $t->foreign('book_id')->references('book_id')->on('books')->cascadeOnUpdate()->cascadeOnDelete();
      $t->foreign('author_id')->references('author_id')->on('authors')->cascadeOnUpdate()->cascadeOnDelete();
    });
  }
  public function down(): void { Schema::dropIfExists('book_author'); }
};