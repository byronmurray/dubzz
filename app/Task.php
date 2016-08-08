<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'body'];
    

	public function processes() {

		return $this->belongsToMany(Process::class)->withTimestamps();
	}

	public function tags() {

		return $this->belongsToMany(Tag::class)->withTimestamps();
	}

	public function user() {

		return $this->belongsTo(User::class);
	}

	/*
	* Get a list of the tag ids associated with the current article
	*
	* @return array
	*/

	public function getTagListAttribute() {

		return $this->tags->lists('id')->all();
	}
}
