<?php

namespace App\Traits;
use AfricasTalking\SDK\AfricasTalking;
use App\Sms;

trait Messaging {
 
  public function sendSMS($student,$message)
  {

 	$username = 'hotlunch'; // use 'sandbox' for development in the test environment
	$apiKey   = 'f00081c7d5230a82b19fded9e16cd5c3ae73df8196ede611cd3694fc6141d4d6'; // use your sandbox app API key for development in the test environment
	$AT       = new AfricasTalking($username, $apiKey);
	$sms      = $AT->sms();
	$result   = $sms->send([
    	'to'      => $student->parent_phone,
    	'from'	  =>'HOTLUNCH',
    	'message' => $message
	]);
 	
 	$smsD=array();
 	$smsD['student_id']=$student->id;
 	$smsD['date']=date('Y-m-d');
 	$smsD['time']=date('H:i:s');
 	$smsD['sms']=$message;
 	Sms::create($smsD);
  }
 
}

?>