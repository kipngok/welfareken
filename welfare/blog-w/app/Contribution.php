<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    //
            protected $table='contributions';	
            protected $fillable = [
           'id','member_id','contribution_amount','contribution_date'
    ];

    public function member(){
    	return $this->hasOne('App\Member', 'id','member_id');
    }

}
