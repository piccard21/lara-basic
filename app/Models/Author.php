<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = ['lastname','forename'];
	
	public function books()
	{
		return $this->belongsToMany('App\Book');
	}
	
}
