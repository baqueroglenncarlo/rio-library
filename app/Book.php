<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Section;
use App\BorrowedBook;

class Book extends Model
{
    protected $fillable = [
        'title','author', 'genre', 'section_id',
    ];

    public function section(){
    	return $this->belongsTo(Section::class);
    }
}
