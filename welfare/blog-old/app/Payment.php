<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table='payment';
      protected $fillable = [
      	'id','student_id','date','time','payment_mode','code','narrative','user_id','amount'
      ];


	 public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }
      public function user(){
		return $this->hasOne('App\User', 'id','user_id');
	}


}
 