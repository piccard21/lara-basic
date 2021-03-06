<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use PHPUnit\Runner\Exception;

class ExampleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
//		$examples = Example::all();
		$examples = Example::orderBy('text', 'asc')->paginate(10);
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
		$this->validate($request, [
			'text' => 'required|min:1|max:121'
		]);
		
		Example::create([
			'text' => $request->input('text')
		]);
		
		return redirect()->route('example.index')->with('message', 'Text created successfully');
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
		$this->validate($request, [
			'text' => 'required|min:1|max:121'
		]);
		
		$example->text = $request->input('text');
		$example->save();
		
		return redirect()->route('example.index')->with('message', 'Text updated successfully');
		
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, Example $example) {
		
//		throw new Exception("Somethnig went terrible wrong");
		
		$example->delete();
		
//		return redirect()->route('example.index')->with('message', 'Example deleted successfully');
		
		$result = [
			'success' => TRUE,
			'message' => __('Example successfully deleted.')
		];
		
		return response()->json($result);
	}
}
