<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Auth\Access\Gate;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Gate as FacadesGate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('books',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'price'=>'required|numeric'
        ]);
        $book = new Book();
        $book->title =  $request->title;
        $book->price =  $request->price;
        $book->user_id =  FacadesAuth::id();
        $book->save();
        return redirect()->route('books.index')->with('status','Book added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        FacadesGate::authorize('view',$id);
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        FacadesGate::authorize('update',$book);
        $request->validate([
            'title'=>'required',
            'price'=>'required|numeric',
        ]);
        $book->save();
        return redirect()->route('books.index')->with('status','Book updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        FacadesGate::authorize('delete',$book);
        $book->delete();
        return redirect()->route('books.index')->with('status','Book deleted Successfully');

    }
}
