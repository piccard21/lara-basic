<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookStoreRequest;
use App\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$books = Book::withAll()->orderBy('title', 'asc')->paginate(10);

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
			'publishers' => $publishers,
			'authors' => $authors,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(BookStoreRequest $request) {
		// just for convenient testing ;-)
		//
		// $this->validate($request, [
		// 	'title' => 'required|min:1|max:121',
		// 	'publisher' => 'required|integer',
		// 	'authors' => 'required|array',
		// 	'authors.*' => 'required|integer',
		// 	'description' => 'nullable|string',
		// 	'publishedAt' => 'nullable|date_format:"Y,m,d"',
		// 	'isbn' => 'nullable|digits:10',
		// ]);

		// DB::transaction(function () use ($request) {

		// 	$book = Book::create([
		// 		'title' => $request->input('title'),
		// 		'publisher_id' => $request->input('publisher'),
		// 		'published_at' => $request->input('publishedAt'),
		// 		'description' => $request->input('description'),
		// 		'isbn' => $request->input('isbn'),
		// 	]);

		// 	$book->authors()->attach($request->input('authors'));
		// });

		$request->store();

		return redirect()->route('book.index')->with('message', 'Book created successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Book $book
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Book $book) {
		return view('book.show')->with([
			'book' => $book,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Book $book
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Book $book) {
		$authors = Author::orderBy('lastname', 'asc')->get();
		$publishers = Publisher::orderBy('name', 'asc')->get();

		return view('book.edit')->with([
			'book' => $book,
			'authors' => $authors,
			'publishers' => $publishers,
		]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Book $book
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(BookStoreRequest $request, Book $book) {
//		$this->validate( $request, [
		//			'title'       => 'required|min:1|max:121',
		//			'publisher'   => 'required|integer',
		//			'authors'   => 'required|array',
		//			'authors.*'   => 'required|integer',
		//			'description'   => 'nullable|string',
		//			'publishedAt' => 'nullable|date_format:"Y,m,d"',
		//			'isbn'   => 'nullable|digits:10'
		//		] );
		//
		//		DB::transaction( function () use ( $book, $request ) {
		//			$book->authors()->sync( $request->input( 'authors' ) );
		//
		//			$book->title        = $request->input( 'title' );
		//			$book->publisher_id = $request->input( 'publisher' );
		//			$book->published_at = $request->input( 'publishedAt' );
		//			$book->description = $request->input( 'description' );
		//			$book->isbn = $request->input( 'isbn' );
		//			$book->save();
		//		} );

		$request->update($book);
		return redirect()->route('book.index')->with('message', 'Book updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Book $book
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Book $book) {
		$book->delete();

//		return redirect()->route( 'book.index' )->with( 'message', 'Book deleted successfully' );
		$result = [
			'success' => TRUE,
			'message' => __('Book successfully deleted.'),
		];

		return response()->json($result);
	}
}
