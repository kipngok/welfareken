<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    //
    protected $table='sms';
     protected $fillable = [
      	'id','student_id','date','time','sms'
      ];


   public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }
  

}
 