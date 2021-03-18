<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Student;
use App\School;
use Illuminate\Http\Request;
use Auth;
use App\Traits\AdjustBalance;
use App\Traits\Messaging;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AdjustBalance;
    use Messaging;

    public function index()
    {
        //

        $schools=School::all();
        $invoices = Invoice::orderBy('created_at','desc')->paginate(20);

        return view('invoice.index',compact('invoices','schools'));
    }

    public function filtered($school_id,$class,$subscription)
    {
        //
        if($school_id=='All'){
            $school_id=NULL;
        }
        if($class=='All'){
            $class=NULL;
        }
        if($subscription=='All'){
            $subscription=NULL;
        }
        $schools=School::all();
        $filters=array();
        $filters['school']=$school_id;
        $filters['class']=$class;
        $filters['subscription']=$subscription;


        $invoices = Invoice::join('student','invoice.student_id','student.id')
                ->when($school_id, function ($query, $school_id) {
                    return $query->where('school_id','=', $school_id);
                })->when($class, function ($query, $class) {

                    return $query->where('class','=', $class);
                })

                ->when($subscription==1, function ($query) {


                    return $query->where('takes_lunch','=', 1);
                })
                ->when($subscription==2, function ($query) {
                     
                    return $query->where('takes_tea','=', 1);
                })
                ->when($subscription==3, function ($query) {

                    return $query->where('takes_lunch','=', 1)->where('takes_tea','=', 1);
                })
                ->orderBy('invoice.created_at','desc')
                ->paginate(20);
        
        return view('invoice.filtered',compact('invoices','filters','schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $student=Student::find($id);
        return view('invoice.create',compact('student'));
    }

    public function batch()
    {
        //
        $schools=School::all();
        return view('invoice.batch',compact('schools'));
    }

    public function saveBatch(Request $request)
    {
        //
        $input=$request->all();
        $school_id=$input['school'];
        $class=$input['class'];
        $subscription=$input['subscription'];

        if($school_id=='All'){
            $school_id=NULL;
        }
        if($class=='All'){
            $class=NULL;
        }
        if($subscription=='All'){
            $subscription=NULL;
        }

        $students = Student::when($school_id, function ($query, $school_id) {
                    return $query->where('school_id','=', $school_id);
                })->when($class, function ($query, $class) {
                    return $query->where('class','=', $class);
                })
                ->when($subscription==1, function ($query) {

                    return $query->where('takes_lunch','=', 1);
                })
                ->when($subscription==2, function ($query) {
                     
                    return $query->where('takes_tea','=', 1);
                })
                ->when($subscription==3, function ($query) {
                    return $query->where('takes_lunch','=', 1)->where('takes_tea','=', 1);
                })
                ->orderBy('created_at','desc')
                ->get();

        foreach ($students as $student) { 
        $invoiceD=array();
        $invoiceD['student_id']=$student->id;
        $invoiceD['date']=$input['date'];
        $invoiceD['time']=$input['time'];
        $invoiceD['lunch']=$input['lunch'];
        $invoiceD['tea']=$input['tea'];
        $invoiceD['amount']=$input['amount'];
        $invoiceD['balance']=$input['amount'];
        $invoiceD['narrative']=$input['narrative'];
        $invoiceD['user_id']=Auth::user()->id;
        $invoiceD['status']='Not Paid';
        $invoice=Invoice::create($invoiceD);
        $this->adjustBalance($student);

        $message=''.$student->name.' has been invoiced kes.'.number_format($invoice->amount,2).' for '.$invoice->narrative.'. Please make a payment using paybill number: 901232 Account number: '.$student->id.'';
        $this->sendSMS($student,$message);
        }
        return redirect('/invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['balance']=$input['amount'];
        $input['status']='Not Paid';
        $invoice=Invoice::create($input);
        $student=$invoice->student;
        $this->adjustBalance($student);

         $message=''.$student->name.' has been invoiced kes.'.number_format($invoice->amount,2).' for '.$invoice->narrative.'. Please make a payment using paybill number: 901232 Account number: '.$student->id.'';
        $this->sendSMS($student,$message);
        return redirect('/invoice/'.$invoice->id);
    }
     

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
        return view('invoice.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
        $student=$invoice->student;
        return view('invoice.edit',compact('invoice','student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['balance']=$input['amount'];
        $invoice->update($input);
        $student=$invoice->student;
        $this->adjustBalance($student);
        return redirect('/invoice/'.$invoice->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
        $invoice->delete();
        $student=$invoice->student;
        $this->adjustBalance($student);
        return redirect('/invoice');
    }
}
