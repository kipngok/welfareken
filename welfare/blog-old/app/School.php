<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	protected $table='school';
     protected $fillable = [
      	'id','name'
      ];
      public function students()
    {
        return $this->hasMany('App\Student', 'school_id', 'id');
    }
}
 