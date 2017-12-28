<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $authors = Author::orderBy('lastname', 'asc')->paginate(10);
	    return view('author.index')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate( $request, [
		    'lastname' => 'required|min:1|max:121',
		    'forename' => 'required|min:1|max:121',
	    ] );
	
	    // TODO: ExceptionHandling
	    Author::create( [
		    'lastname'    => $request->input( 'lastname' ),
		    'forename'    => $request->input( 'forename' )
	    ] );
	
	    return redirect()->route( 'author.index' )->with( 'message', 'Author created successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Author $author)
    {
	    return view('author.show')->with([
		    'author' => $author
	    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Author $author)
    {
	    return view('author.edit')->with([
		    'author' => $author
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
	    $this->validate( $request, [
		    'lastname' => 'required|min:1|max:121',
		    'forename' => 'required|min:1|max:121'
	    ] );
	
	    $author->lastname = $request->input( 'lastname' );
	    $author->forename = $request->input( 'forename' );
	 
	    return redirect()->route( 'author.index' )->with( 'message', 'Author updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Author $author)
    {
	    return redirect()->route( 'author.index' )->with( 'message', 'Author deleted successfully' );
    }
}
