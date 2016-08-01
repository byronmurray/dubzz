<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'body'];
    
	public function steps() {

		return $this->hasMany(Step::class);
	}


	public function processes() {

		return $this->belongsToMany(Process::class)->withTimestamps();
	}
}
