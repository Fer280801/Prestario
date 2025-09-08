<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseCatalogSeeder extends Seeder {
  public function run(): void {
    // Idiomas
    DB::table('languages')->upsert([
    ['code' => 'es', 'name' => 'Español'],
    ['code' => 'en', 'name' => 'Inglés'],
    ['code' => 'fr', 'name' => 'Francés'],
    ['code' => 'de', 'name' => 'Alemán'],
    ['code' => 'it', 'name' => 'Italiano'],
    ['code' => 'pt', 'name' => 'Portugués'],
    ['code' => 'ru', 'name' => 'Ruso'],
    ['code' => 'ja', 'name' => 'Japonés'],
    ['code' => 'zh', 'name' => 'Chino'],
    ['code' => 'ar', 'name' => 'Árabe'],
], ['code'], ['name']);

    // Categorías raíz
    DB::table('categories')->updateOrInsert(['name'=>'Ficción','parent_id'=>null], ['status'=>1]);
    DB::table('categories')->updateOrInsert(['name'=>'No ficción','parent_id'=>null], ['status'=>1]);

    // Editorial demo
    DB::table('publishers')->updateOrInsert(['name'=>'Editorial Ejemplo'], ['country'=>'MX']);
  }
}