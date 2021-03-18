<?php

namespace App\Http\Controllers;

use App\Contribution;
use Illuminate\Http\Request;

class ContributionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $contributions= Contribution::orderBy('created_at','desc')->paginate(10);
        return view('contribution.index', compact('contributions'))
         ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contributions = Contribution::all();
        return(view ('contribution.create'), compact('contributions'));
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
        $contributions=Contribution::create($request->all());
        return redirect('/contribution/create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contributions=Contribution::find($id);
        return view('contribution.show' compact('con'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $contributions= Contribution::find($id);
        return view('contribution.edit', compact('contributions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contribution $id)
    {
        //
        $contributions= Contribution::find($id);
        $input=$request->all();
        $code->update($input);
        return redirect('/contribution/'.$contributions->id);
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contribution $id)
    {
        //
        $contributions=Contribution::find($id);
        $contributions->delete();
        return redirect('/contribution');
       
    }
}
