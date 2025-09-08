<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('publishers', function (Blueprint $t) {
      $t->id('publisher_id');
      $t->string('name', 120)->unique();
      $t->string('country', 60)->nullable();
      $t->string('website', 150)->nullable();
      $t->timestamps();
    });
  }
  public function down(): void { Schema::dropIfExists('publishers'); }
};
