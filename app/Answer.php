<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];
    
  

    public function questions(){
    	return $this->belongsTo('App\Question');
    }
}
