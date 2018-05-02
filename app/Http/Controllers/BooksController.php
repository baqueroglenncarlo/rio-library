<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;
use App\Book;
use App\BorrowedBook;
use Auth;
use Carbon\Carbon;


class BooksController extends Controller
{
    public function create(){
    	$this->validate(request(),[
    		'title' => 'required',
    		'author' => 'required',
    		'genre' => 'required',
    	]);

    	$add = Book::create(request(['title', 'author', 'genre', 'section_id']));

    	return redirect('/add');
    }

    public function view(){

        if(request('search')){
            $search = request('search');
            $genre = request('category');
            $books = Book::selectRaw('books.*, sections.section_name')
                    ->leftjoin('sections', 'books.section_id', '=', 'sections.id')
                    ->where('status', '0')
                    ->where($genre, 'like', '%'.$search.'%')
                    ->paginate(10);
        }else{
            $books = Book::selectRaw('books.*, sections.section_name')
                    ->leftjoin('sections', 'books.section_id', '=', 'sections.id')
                    ->where('status', '0')
                    ->paginate(10);
        }

        return view('books.view', compact('books'));
    }

    public function show(){
        $book = BorrowedBook::selectRaw('borrowedbooks.*, books.*')
                    ->leftjoin('books', 'borrowedbooks.book_id', '=', 'books.id')
                    ->leftjoin('users', 'borrowedbooks.user_id', '=', 'users.id')
                    ->paginate(5);

        return view('books.borrowed_books', compact('book'));
    }

    public function borrow($id){
        $book = Book::find($id);
        $book->status = 1;
        $book->save();

        $datetoday = Carbon::today();
        $datetoreturn = Carbon::today()->addDays(3);

        $borrowbook = BorrowedBook::create(['user_id'=>auth()->user()->id,'book_id'=>$id,'dateborrowed'=>$datetoday,'datereturn'=>$datetoreturn]);

        return redirect('/viewbooks');
    }

    public function viewborrowed(){
        if(request('search')){
            $search = request('search');
            $genre = request('category');
            $book = BorrowedBook::selectRaw('borrowedbooks.*, books.*')
                    ->leftjoin('books', 'borrowedbooks.book_id', '=', 'books.id')
                    ->leftjoin('users', 'borrowedbooks.user_id', '=', 'users.id')
                    ->where('user_id', auth()->user()->id)
                    ->where($genre, 'like', '%'.$search.'%')
                    ->paginate(5);
        }else{
            $book = BorrowedBook::selectRaw('borrowedbooks.*, books.*')
                    ->leftjoin('books', 'borrowedbooks.book_id', '=', 'books.id')
                    ->leftjoin('users', 'borrowedbooks.user_id', '=', 'users.id')
                    ->where('user_id', auth()->user()->id)
                    ->paginate(5);
        }

        return view('books.borrowed_books', compact('book'));
    }

    public function returnbook($id){
        $bookborrowed = BorrowedBook::where('book_id', $id);
        $bookborrowed->delete();

        $book = Book::find($id);
        $book->status = 0;
        $book->save();

        

        return redirect('/borrow');

    }
}
