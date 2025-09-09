<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $primaryKey = 'loan_id';
    protected $fillable = [
        'copy_id','member_id','start_date','due_date','return_date','status','fine_amount','notes'
    ];

    public function copy()   { return $this->belongsTo(Copy::class,   'copy_id',   'copy_id')->with('book'); }
    public function member() { return $this->belongsTo(Member::class, 'member_id', 'member_id'); }
}