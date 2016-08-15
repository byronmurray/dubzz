<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    
	protected $fillable = ['approved', 'seen'];


    public function user() {

		return $this->belongsTo(User::class);
	}

}
