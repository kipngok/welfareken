<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
 protected $table='members';	
            protected $fillable = [
          'id','first_name','middle_name','last_name','dob','no_of_children','id_number','home_cell_group','home_cell_leader','partner_first_name','partner_middle_name','partner_last_name','partner_dob','partner_id_number','next_of_kin_first_name','next_of_kin_middle_name','next_of_kin_last_name','next_of_kin_id_number','image','date_of_membership'
      ];
public function sms(){
       	return $this->hasMany('App\Member','member_id','id');
       }
}