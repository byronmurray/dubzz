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
}
