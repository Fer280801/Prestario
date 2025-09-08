<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = 'reservation'; // Porque no se llama "id"
    public $timestamps = true;

    protected $fillable = [
        'book_id',
        'member_id',
        'queued_at',
        'expires_at',
        'status',
    ];
}
