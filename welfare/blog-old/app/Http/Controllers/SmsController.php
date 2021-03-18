<?php

namespace App\Http\Controllers;

use App\Sms;
use App\Student;
use App\School;
use Illuminate\Http\Request;
use App\Traits\Messaging;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Messaging;
    public function index()
    {
        //
        $smses = SMS::orderBy('created_at','desc')->paginate(20);
        return view('sms.index', compact('smses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools=School::all();
        return view('sms.create', compact('schools'));
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
        foreach ($students as $student){
            $message=$input['message'];
            $this->sendSMS($student,$message);
        }
        return redirect('/sms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
