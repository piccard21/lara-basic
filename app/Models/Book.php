<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $fillable = ['title', 'published_at', 'publisher_id', 'description', 'isbn'];

	public function publisher() {
		return $this->belongsTo('App\Publisher');
	}

	public function authors() {
		return $this->belongsToMany('App\Author');
	}

	// \App\Book::with(['authors', 'publisher'])->find(12);
	public function scopeWithAll($query) {
		$query->with(['authors', 'publisher']);
		// or store them in protected variable - whatever you prefer
		// the latter would be the way if you want to have the method
		// in your BaseModel. Then simply define it as [] there and use:
		// $query->with($this->allRelations);
	}
}
