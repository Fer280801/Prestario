<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $t) {
            $t->id('category_id');              // PK
            $t->string('name', 100);
            $t->unsignedBigInteger('parent_id')->nullable();
            $t->text('description')->nullable();
            $t->tinyInteger('status')->default(1);
            $t->timestamps();

            $t->foreign('parent_id')
              ->references('category_id')->on('categories')
              ->nullOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};