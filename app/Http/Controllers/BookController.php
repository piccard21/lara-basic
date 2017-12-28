<?php

namespace App\Http\Controllers;

use App\Book;
use App\Publisher;
use App\Author;
use Illuminate\Http\Request;

class BookController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$books = Book::orderBy('title', 'asc')->paginate(10);
		return view('book.index')->with('books', $books);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$authors = Author::orderBy('lastname', 'asc')->get();
		$publishers = Publisher::orderBy('name', 'asc')->get();
		
		return view('book.create')->with([
			'publishers' =>  $publishers,
			'authors' =>  $authors
		]);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required|min:1|max:121',
			'publisher' => 'required|integer',
			'publishedAt' => 'required|date_format:"Y,m,d"',
			'authors.*' => 'required|integer',
		]);
		
		
//		$publisher = Publisher::find($request->input("publisher"));
		
		// TODO
		// if not found withErrors
		
		$book = Book::create([
			'title' => $request->input('title'),
			'publisher_id' => $request->input('publisher'),
			'published_at' => $request->input('publishedAt')
		]);
		
		
		$book->authors()->attach($request->input('authors'));
		
		// TODO
		// if create????
		// cascade oder detach
		
		return redirect()->route('book.index')->with('message', 'Book created successfully');
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Book $book
	 * @return \Illuminate\Http\Response
	 */
	public function show(Book $book) {
		return view('book.show')->with([
			'book' => $book
		]);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Book $book
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Book $book) {
		$authors = Author::orderBy('lastname', 'asc')->get();
		$publishers = Publisher::orderBy('name', 'asc')->get();
		
		return view('book.edit')->with([
			'book' => $book,
			'authors' => $authors,
			'publishers' => $publishers
		]);
		
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Book $book
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Book $book) {
		$this->validate($request, [
			'title' => 'required|min:1|max:121',
			'publisher' => 'required|integer',
			'publishedAt' => 'required|date_format:"Y,m,d"',
			'authors.*' => 'required|integer',
		]);
		
		$book->title = $request->input('title');
		$book->publisher_id = $request->input('publisher');
		$book->published_at = $request->input('publishedAt');
		$book->save();
		
		
		return redirect()->route('book.index')->with('message', 'Book updated successfully');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Book $book
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Book $book) {
		$book->delete();
		return redirect()->route('book.index')->with('message', 'Book deleted successfully');
	}
}
