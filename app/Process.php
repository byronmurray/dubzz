<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = ['title', 'process_id'];


    public function tasks() {

		return $this->belongsToMany(Task::class)->withTimestamps();
	}

	public function processes() {

		return $this->hasMany(Process::class);
	}

	public function user() {

		return $this->belongsTo(User::class);
	}
}
