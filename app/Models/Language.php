<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $primaryKey = 'lang_id';

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Book::class, 'lang_id');
    }
}