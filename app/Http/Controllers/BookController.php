<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $user =auth()->user();
        $books = $user->books()->notDeleteds()->get();
        return view('books.index', compact('books'));
    }
    public function create(){
        
        return view('books.create');
    }
     public function store(BookStoreRequest $request){
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->user_id = auth()->id();
        $book->save(); 
        return redirect()->back();
    }
    public function edit($id){
        $user = auth()->user();
        $book = $user->books::notDeleteds()->findOrFail($id);
        return view('books.edit', compact('book'));

    }
    public function update(BookStoreRequest $request, $id){
        $user = auth()->user();
        $book = $user->books()::notDeleteds()->findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();

        return redirect()->back();                   
    }
    public function delete($id){
        $book = Book::findOrFail($id)->update(['is_deleted' => 1]);
        return redirect()->back();

    }
}
