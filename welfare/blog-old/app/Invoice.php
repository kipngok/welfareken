<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   protected $table='invoice';
     protected  $fillable  = [
    	'id','student_id','date','time','lunch','tea','amount','balance','narrative','user_id','status'
      ];

	public function student(){
		return $this->hasOne('App\Student', 'id','student_id');
	}
    public function user(){
		return $this->hasOne('App\User', 'id','user_id');
	}


}
