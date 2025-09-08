<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('copies', function (Blueprint $t) {
      $t->id('copy_id');
      $t->unsignedBigInteger('book_id');
      $t->string('barcode', 50)->unique();
      $t->enum('status', ['available','loaned','lost','repair'])->default('available');
      $t->string('location', 100)->nullable();
      $t->timestamps();

      $t->foreign('book_id')->references('book_id')->on('books')->cascadeOnUpdate()->cascadeOnDelete();
      $t->index('book_id');
      $t->index('status');
    });
  }
  public function down(): void { Schema::dropIfExists('copies'); }
};