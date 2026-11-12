<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public $fillable =['user_id','book_id','loan_date','return_date','returned_at','status','fine'];

    protected $casts = [
        'loan_date'=>'date',
        'return_date'=>'date',
        'returned_at'=>'datetime',
    ];

    public function user() {return $this->belongsTo(User::class);}
    public function book() {return $this->belongsTo(Book::class);}
}
