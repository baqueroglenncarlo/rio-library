<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\BorrowedBook;
use App\Book;

class UsersController extends Controller
{
    public function create(){
        $this->validate(request(),[
            'firstname' => 'required',
            'lastname'  => 'required',
            'username'  => 'required',
            'password'  => 'required|confirmed'
        ]);

        if(User::where('username', request('username'))->count() > 0){
            echo "User Found";
        }else{
            $register = User::create(request(['firstname', 'lastname', 'username']));
            $register->password = bcrypt(request('password'));
            $register->save();
            echo "Success";
        }
    }

    public function login(){
        if(!auth()->attempt(request(['username', 'password']))){
            echo "Invalid Username or Password";
        }else{
            echo "Success";
        }
        
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
