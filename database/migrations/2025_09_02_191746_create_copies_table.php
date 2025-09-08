<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('members', function (Blueprint $t) {
      $t->id('member_id');
      $t->string('full_name', 120);
      $t->string('email', 120)->unique()->nullable();
      $t->enum('status', ['active','inactive'])->default('active');
      $t->timestamps();
    });
  }
  public function down(): void { Schema::dropIfExists('members'); }
};
