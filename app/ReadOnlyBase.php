<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadOnlyBase
{
    protected $department_name = [],
             $trimester = [],
             $period = [],
             $user_type = [];

   public function department_name(){
       return $this->department_name;
   }
   public function trimester(){
    return $this->trimester;
    }
    public function period(){
        return $this->period;
    }
    public function user_type(){
        return $this->user_type;
    }
}
