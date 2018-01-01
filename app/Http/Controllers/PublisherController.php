<?php

namespace App\Http\Controllers;

use Validator;
use App\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$publishers = Publisher::orderBy( 'name', 'asc' )->paginate( 10 );

		return view( 'publisher.index' )->with( 'publishers', $publishers );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'publisher.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
//		$this->validate( $request, [
//			'name' => 'required|min:1|max:121'
//		] );

		// custom error-messages
		$messages = [
			'required' => 'The :attribute field is required.',
//			'between' => 'The :attribute value :input is not between :min - :max.',
			'name.between' => 'The name has to be between :min - :max characters long', // specific field
		];

		$validator = Validator::make($request->all(), [
			'name' => 'required|between:1,121',
		], $messages)->validate();


		Publisher::create( [
			'name' => $request->input( 'name' )
		] );

		return redirect()->route( 'publisher.index' )->with( 'message', 'Publisher created successfully' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Publisher $publisher
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Request $request, Publisher $publisher ) {
		return view( 'publisher.show' )->with( [
			'publisher' => $publisher
		] );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Publisher $publisher
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Publisher $publisher ) {
		return view( 'publisher.edit' )->with( [
			'publisher' => $publisher
		] );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Publisher $publisher
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Publisher $publisher ) {
		$this->validate( $request, [
			'name' => 'required|min:1|max:121'
		] );

		$publisher->name = $request->input( 'name' );
		$publisher->save();

		return redirect()->route( 'publisher.index' )->with( 'message', 'Publisher updated successfully' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Publisher $publisher
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Publisher $publisher ) {
		$publisher->delete();

//		return redirect()->route( 'publisher.index' )->with( 'message', 'Publisher deleted successfully' );
		$result = [
			'success' => TRUE,
			'message' => __('Publisher successfully deleted.')
		];
		
		return response()->json($result);
	}
}
