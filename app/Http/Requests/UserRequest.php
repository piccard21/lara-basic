<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
	    return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'name'       => 'required|min:1|max:121',
		    'email'   => 'required|email',
		    'password'   => 'required|min:3',
		    'roles'   => 'required|array',
		    'roles.*'   => 'required|integer'
	    ];
    }

	public function store() {

		DB::transaction( function () {

			$user = User::create( [
				'name'        => $this->input( 'name' ),
				'email' => $this->input( 'email' ),
				'password' => bcrypt($this->input( 'password' )),
			] );

			$user->roles()->attach( $this->input( 'roles' ) );
		} );
	}

	public function update(User $user) {

		DB::transaction( function () use ( $user  ) {
			$user->roles()->sync( $this->input( 'roles' ) );

			$user->name        = $this->input( 'name' );
			$user->email = $this->input( 'email' );
			$user->password = bcrypt($this->input( 'password' ));
			$user->save();
		} );

	}
}
