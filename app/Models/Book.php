<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
	
	protected $fillable = ['title', 'published_at', 'publisher_id'];
	
	public function publisher() {
		return $this->belongsTo('App\Publisher');
	}
	
	public function authors() {
		return $this->belongsToMany('App\Author');
	}
}
