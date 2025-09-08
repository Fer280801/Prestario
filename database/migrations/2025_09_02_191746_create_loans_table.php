<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('loans', function (Blueprint $t) {
      $t->id('loan_id');
      $t->unsignedBigInteger('copy_id');
      $t->unsignedBigInteger('member_id');
      $t->dateTime('start_date');
      $t->dateTime('due_date');
      $t->dateTime('return_date')->nullable();
      $t->enum('status', ['active','returned','overdue'])->default('active');
      $t->decimal('fine_amount', 8, 2)->default(0);
      $t->string('notes', 200)->nullable();
      $t->timestamps();

      $t->foreign('copy_id')->references('copy_id')->on('copies')->cascadeOnUpdate()->restrictOnDelete();
      $t->foreign('member_id')->references('member_id')->on('members')->cascadeOnUpdate()->restrictOnDelete();
      $t->index(['member_id','status']);
      $t->index(['copy_id','status']);
    });
  }
  public function down(): void { Schema::dropIfExists('loans'); }
};