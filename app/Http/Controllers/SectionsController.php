<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;

class SectionsController extends Controller
{
    public function create(){
    	$this->validate(request(),[
    		'section_name' => 'required',
    	]);

    	if(Section::where('section_name',request('section_name'))->count() > 0){
    		echo "Already Exist";
    	}else{
    		echo "Success";
    		$section = Section::create(request(['section_name']));
    	}
    }
}
