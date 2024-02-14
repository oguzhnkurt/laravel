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
    public function edit($id){
        $user = auth()->user();
        $book = $user->books()->notDeleteds()->findOrFail($id);
        return view('books.edit', compact('book'));

    }
    public function update(BookStoreRequest $request, $id){
        $user= auth()->user();
        $book= $user->books()->notDeleteds()->findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        Cache::delete('books');

        return redirect()->back();                   
    }
    public function delete($id){
        Book::findOrFail($id)->delete();
        Cache::delete('books');
        return redirect()->back();

    }
}
