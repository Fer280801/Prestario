<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseCatalogSeeder extends Seeder {
  public function run(): void {
    // Idiomas
    DB::table('languages')->upsert([
      ['lang_code'=>'es','name'=>'Spanish'],
      ['lang_code'=>'en','name'=>'English'],
      ['lang_code'=>'fr','name'=>'French'],
    ], ['lang_code'], ['name']);

    // Categorías raíz
    DB::table('categories')->updateOrInsert(['name'=>'Ficción','parent_id'=>null], ['status'=>1]);
    DB::table('categories')->updateOrInsert(['name'=>'No ficción','parent_id'=>null], ['status'=>1]);

    // Editorial demo
    DB::table('publishers')->updateOrInsert(['name'=>'Editorial Ejemplo'], ['country'=>'MX']);
  }
}