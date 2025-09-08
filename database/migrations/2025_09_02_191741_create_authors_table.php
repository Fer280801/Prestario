<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $t) {
            $t->id('author_id');                 // PK correcto
            $t->string('full_name', 120);
            $t->smallInteger('birth_year')->nullable();
            $t->string('nationality', 80)->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};