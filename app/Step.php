<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['title', 'body'];

    public function tasks(){
    	return $this->belongsTo(Procedure::class);
    }
}
