<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('fines', function (Blueprint $t) {
      $t->id('fine_id');
      $t->unsignedBigInteger('member_id');
      $t->unsignedBigInteger('loan_id')->nullable();
      $t->decimal('amount', 8, 2);
      $t->string('reason', 200)->nullable();
      $t->dateTime('paid_at')->nullable();
      $t->timestamp('created_at')->useCurrent();

      $t->foreign('member_id')->references('member_id')->on('members')->cascadeOnUpdate()->restrictOnDelete();
      $t->foreign('loan_id')->references('loan_id')->on('loans')->cascadeOnUpdate()->nullOnDelete();
      $t->index('member_id');
      $t->index('paid_at');
    });
  }
  public function down(): void { Schema::dropIfExists('fines'); }
};
