<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;

class ExampleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
//		$examples = Example::all();
		$examples = Example::paginate(5);
//	    return view( 'example.index', compact( 'examples' ) );
		return view('example.index')->with('examples', $examples);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('example.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate( $request, [
			'text' => 'required|min:1|max:121'
		] );
		
		Example::create( [
			'text'    => $request->input( 'text' )
		] );
		
		return redirect()->route( 'example.index' )->with( 'message', 'Text created successfully' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, Example $example) {
		return view('example.show')->with([
			'example' => $example
		]);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, Example $example) {
		return view('example.edit')->with([
			'example' => $example
		]);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Example $example) {
		$this->validate( $request, [
			'text' => 'required|min:1|max:121'
		] );
		
		$example->text = $request->input( 'text' );
		
		if ( $example->save() ) {
			return redirect()->route( 'example.index' )->with( 'message', 'Text updated successfully' );
		} else {
			return redirect()->back()->withErrors( [
				"message" => "Board couldn't be updated"
			] );
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, Example $example) {
		if ( $example->delete() ) {
			return redirect()->route( 'example.index' )->with( 'message', 'Example deleted successfully' );
		} else {
			return redirect()->back()->withErrors( [
				"message" => "Example couldn't be deleted"
			] );
		}
	}
}
