<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $primaryKey = 'publishers_id';

    protected $fillable = [
        'name', 'country', 'website'
    ];
}