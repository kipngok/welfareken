<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
     protected $table='student';
     protected $fillable = [
      	'id','name','class','school_id','parent_name','parent_phone','takes_lunch','takes_tea','status'
      ];
       public function invoices(){
       	return $this->hasMany('App\Invoice','student_id','id');
       }

       public function payments(){
       	return $this->hasMany('App\Payment','student_id','id');
       }

       public function school(){
       	return $this->hasOne('App\School','id','school_id');
       }

    public function sms(){
       	return $this->hasMany('App\Student','student_id','id');
       }

    public function getBalanceAttribute($value)
    {
        $balance=$this->invoices()->sum('balance');
        return $balance;
    }
}

