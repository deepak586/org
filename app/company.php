<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    //protected $table = 'company';

    public function employees(){
        return $this->hasMany('App/Employee');
     }
}
