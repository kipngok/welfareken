
<?php

namespace App\Http\Controllers;
use Auth;
use App\Student;
use App\Payment;
use App\School;
use Illuminate\Http\Request;
use App\Traits\AdjustBalance;
use App\Traits\Messaging;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http  \Response
     */
    use AdjustBalance;
    use Messaging;

    public function index()
    {
        //
        $schools=School::all();
        $payments = Payment::orderBy('created_at','desc')->paginate(20);
        return view('payment.index',compact('payments','schools'));
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

        $payments = Payment::join('student','payment.student_id','student.id')
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
                ->orderBy('payment.created_at','desc')
                ->paginate(20);

        return view('payment.filtered',compact('payments','filters','schools'));
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
        return view('payment.create',compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $payment=Payment::create($input);
        $student=$payment->student;
        $this->adjustBalance($student);

         $message='Your payment for '.$student->name.' has been received. Amount: kes.'.number_format($payment->amount,2).' Balance: kes.'.number_format($payment->student->balance,2).'. Thank You. ';
        $this->sendSMS($student,$message);

        return redirect('/payment/'.$payment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
        return view('payment.show',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
        $student=$payment->student;
         return view('payment.edit',compact('payment','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $payment->update($input);
        $student=$payment->student;
        $this->adjustBalance($student);
        return redirect('/payment/'.$payment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
        $payment->delete();
        $student=$payment->student;
        $this->adjustBalance($student);
        return redirect('/payment');
    }
}
