<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
protected $primaryKey = 'book_id';
    protected $fillable = [
        'isbn', 'title', 'author_id', 'category_id', 'lang_id',
        'pages', 'year_pub', 'description', 'publishers_id'
    ];
    public function author() {
    return $this->belongsTo(Author::class);
}

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publishers_id');
    }

}
