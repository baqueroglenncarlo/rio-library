<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowedbook extends Model
{
    protected $fillable = [
        'user_id','book_id','dateborrowed','datereturn',
    ];

   
}
