<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$users = User::orderBy( 'name', 'asc' )->paginate( 10 );

		return view( 'user.index' )->with( 'users', $users );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$roles    = Role::orderBy( 'name', 'asc' )->get();

	    return view( 'user.create' )->with( [
		    'roles' => $roles
	    ] );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( UserRequest $user_request ) {
		$user_request->store();

		return redirect()->route( 'user.index' )->with( 'message', 'User created successfully' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( User $user ) {
		return view( 'user.show' )->with( [
			'user' => $user
		] );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(  User $user  ) {
		$roles    = Role::orderBy( 'name', 'asc' )->get();
		return view( 'user.edit' )->with( [
			'user' => $user,
			'roles' => $roles
		] );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( UserRequest $user_request, User $user  ) {
		$user_request->update($user);

		return redirect()->route( 'user.index' )->with( 'message', 'User updated successfully' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( User $user ) {
		$user->delete();

		$result = [
			'success' => TRUE,
			'message' => __('User successfully deleted.')
		];

		return response()->json($result);
	}
}
