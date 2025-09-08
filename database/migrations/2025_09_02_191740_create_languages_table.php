<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $t) {
            $t->id('lang_id');                  // PK usado por books.lang_id
            $t->string('code', 5)->unique();    // ej: es, en, fr...
            $t->string('name', 60);
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};