<?php

namespace App\Http\Controllers;

use App\Sms;
use App\Member;
use App\Traits\Messaging;
use Illuminate\Http\Request;

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
        $members=Member::all();
        
        return view('sms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $members=Member::all();
      
        return view('sms.create', compact('members'));
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
        $members=Member::all();
        
         $input=$request->all();
         $smses=Sms::create($input);
         $smses->contact;
         $message=$smses->sms;
        $this->sendSMS($smses,$message);
        return redirect('/sms/'.$smses->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sms  $Sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sms  $Sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sms  $Sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sms  $Sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $Sms)
    {
        //
    }
}
