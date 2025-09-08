<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('reservations', function (Blueprint $t) {
      $t->id('reservation_id');
      $t->unsignedBigInteger('book_id');
      $t->unsignedBigInteger('member_id');
      $t->dateTime('queued_at')->default(now());
      $t->dateTime('expires_at')->nullable();
      $t->enum('status', ['active','fulfilled','expired','cancelled'])->default('active');
      $t->timestamps();

      $t->foreign('book_id')->references('book_id')->on('books')->cascadeOnUpdate()->cascadeOnDelete();
      $t->foreign('member_id')->references('member_id')->on('members')->cascadeOnUpdate()->cascadeOnDelete();
      $t->index(['book_id','status']);
      $t->index('member_id');
    });
  }
  public function down(): void { Schema::dropIfExists('reservations'); }
};