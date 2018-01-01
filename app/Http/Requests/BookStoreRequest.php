<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Book;
use Illuminate\Support\Facades\DB;

class BookStoreRequest extends FormRequest
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
		    'title'       => 'required|min:1|max:121',
		    'publisher'   => 'required|integer',
		    'authors'   => 'required|array',
		    'authors.*'   => 'required|integer',
		    'description'   => 'nullable|string',
		    'publishedAt' => 'nullable|date_format:"Y,m,d"',
		    'isbn'   => 'nullable|digits:10'
	    ];
    }

	/**
	 * apply logic
	 */
    public function persist() {

	    DB::transaction( function () {

		    $book = Book::create( [
			    'title'        => $this->input( 'title' ),
			    'publisher_id' => $this->input( 'publisher' ),
			    'published_at' => $this->input( 'publishedAt' ),
			    'description' => $this->input( 'description' ),
			    'isbn' => $this->input( 'isbn' )
		    ] );

		    $book->authors()->attach( $this->input( 'authors' ) );
	    } );
    }

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'title.required' => 'I need a title, man :-(',
			'publisher.integer'  => 'I need a publisher, man :-(',
		];
	}
}
