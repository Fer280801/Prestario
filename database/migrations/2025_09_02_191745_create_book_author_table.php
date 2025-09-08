<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('categories', function (Blueprint $t) {
      $t->id('category_id');
      $t->string('name', 100);
      $t->unsignedBigInteger('parent_id')->nullable();
      $t->text('description')->nullable();
      $t->tinyInteger('status')->default(1); // 1=activo, 0=inactivo
      $t->timestamps();

      $t->foreign('parent_id')->references('category_id')->on('categories')
        ->cascadeOnUpdate()->nullOnDelete();
      $t->unique(['parent_id','name']); // evita duplicados en mismo padre
    });
  }
  public function down(): void { Schema::dropIfExists('categories'); }
};
