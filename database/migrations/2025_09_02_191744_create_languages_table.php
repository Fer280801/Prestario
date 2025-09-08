<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('languages', function (Blueprint $t) {
      $t->char('lang_code', 2)->primary();
      $t->string('name', 50);
    });
  }
  public function down(): void { Schema::dropIfExists('languages'); }
};
