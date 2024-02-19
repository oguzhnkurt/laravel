<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function index(){
        $user =auth()->user();
        $books = $user->books()->get();
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

        Cache::delete('books');

        return redirect()->back();
    }
    public function edit(Book $book){
        $user = auth()->user();
        abort_if(!$user->books()->pluck('id')->contains($book->id), 404);
        
        return view('books.edit', compact('book'));

    }
    public function update(Request $request, Book $book){
        $user = auth()->user();
        abort_unless($user->books()->pluck('id')->contains($book->id),404);
        
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        Cache::delete('books');

        return redirect()->back();                   
    }
    
    public function delete(Book $book){
        $book->delete();
        Cache::delete('books');
        return redirect()->back();

    }
}
