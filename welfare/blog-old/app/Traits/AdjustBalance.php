<?php

namespace App\Traits;
trait AdjustBalance {
 
  public function adjustBalance($student)
  {

 	$totalInvoices=$student->invoices()->sum('amount');
 	$totalPayments=$student->payments()->sum('amount');
 	$invoices=$student->invoices;
 	$remainder=$totalPayments;
 	foreach($invoices as $invoice){
 		if($invoice->amount <=$remainder){
 			$invoiceD=array();
 			$invoiceD['status']='Paid';
 			$invoice['balance']=0;
 			$invoice->update($invoiceD);
 			$remainder=$remainder-$invoice->amount;
 		}
 		elseif($invoice->amount >=$remainder && $remainder!=0){
 			$invoiceD=array();
 			$invoiceD['status']='Partially Paid';
 			$invoice['balance']=$invoice->amount-$remainder;
 			$invoice->update($invoiceD);
 			$remainder=0;
 		}
 		elseif($remainder==0){
			$invoiceD=array();
 			$invoiceD['status']='Not Paid';
 			$invoice['balance']=$invoice->amount;
 			$invoice->update($invoiceD);
 		}
 	}
  }
 
}

?>