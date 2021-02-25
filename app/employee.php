<?php

namespace App;
use App\Company;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   // protected $table = 'employee';

   public function company(){
    return $this->belongsTo('App\Company','company_id');
   }
}
