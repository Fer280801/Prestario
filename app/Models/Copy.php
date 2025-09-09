<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    protected $primaryKey = 'copy_id';
    protected $fillable = ['book_id','barcode','status','location'];

    public function book() { return $this->belongsTo(Book::class, 'book_id', 'book_id'); }
}