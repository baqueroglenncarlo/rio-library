<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;

class ViewController extends Controller
{
    public function index(){
    	return view('books.index');
    }
    public function addnewbook(){
    	$section = Section::orderBy('section_name', 'ASC')->get();

    	return view('forms.addbooks', compact('section'));
    }
}
