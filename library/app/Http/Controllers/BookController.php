<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $book = response()->json(Book::all());
        return $book;
    }

    public function show($id){
        $book = response()->json(Book::find($id));
        return $book;
    }

    public function destroy($id){
        Book::find($id)->delete();
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->author = $request->author;
        $book->title = $request->title;
        
        $book->save();
        //még nem létezik...
        return redirect('/book/list');
    }

    public function store(Request $request){
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        
        $book->save();
        //még nem létezik...
        return redirect('/book/list');
    }

    //view függvények
    public function listView(){
        $books = Book::all();
        return view('book.list', ['books' => $books]);
    }

     public function newView(){
        $user = User::all();
        return view('task.new', ['users' => $user]);
     }

     public function editView($id){
        $user = User::all();
        $book = Book::find($id);
        return view('task.new', ['users' => $user, "books" => $book]);
     }
}
