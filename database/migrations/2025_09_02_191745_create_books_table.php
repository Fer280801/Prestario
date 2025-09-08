<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('authors', function (Blueprint $t) {
      $t->id('author_id');
      $t->string('full_name', 120);
      $t->smallInteger('birth_year')->nullable();
      $t->string('nationality', 60)->nullable();
      $t->timestamps();

      $t->unique('full_name');
    });
  }
  public function down(): void { Schema::dropIfExists('authors'); }
};
