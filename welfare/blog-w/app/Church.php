<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
            protected $table='churchs';	
            protected $fillable = [
         'id','church_name', 'contact', 'email', 'kra_pin', 'image'
    ];

  


      
}
