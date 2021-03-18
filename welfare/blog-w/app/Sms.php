<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    //
    protected $table='sms';
     protected $fillable = [
      	'id','contact','date','time','sms'
      ];


   public function student()
    {
        return $this->hasOne('App\Member', 'id', 'member_id');
    }
  

}
 