<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Book;
use App\BorrowedBook;

class Section extends Model
{
    public function book(){
    	return $this->hasMany(Book::class);
    }
}
