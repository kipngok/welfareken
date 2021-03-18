<?php

namespace App\Http\Controllers;
use App\Church;
use App\Product;

use Illuminate\Http\Request;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
        $church = Church::orderBy('created_at','desc')->paginate(10);
        return view('church.index',compact('church'))
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
         $church = Church::all();
        return view('church.create',compact('church'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'id','church_name', 'contact', 'image'
        //
        $this->validate(request(), [
        'church_name'=>'required',
        'contact'=>'required',
        'email'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
    
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./public/images/',$fileName);
        }
       $church=Church::create([
            'church_name' => request()->get('church_name'),
            'contact'=>request()->get('contact'),
            'email'=>request()->get('email'),
            'kra_pin'=>request()->get('kra_pin'),
            'image'=>$fileName

        ]);
        return redirect('/church/'.$church->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\church  $church
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $church=Church::find($id);
        return view('church.show', compact('church'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $church=Church::find($id);
        return view('church.edit', compact('church'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
    //    public function update(Request $request, Product $product)
    // {
        //id','church_name', 'contact', 'image'
     $this->validate(request(), [
        'church_name'=>'required',
        'contact'=>'required',
        'email'=>'required',
        'kra_pin'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
    
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./public/images/',$fileName);
        }
       $church=Church::update([
            'church_name' => request()->get('church_name'),
            'contact'=>request()->get('contact'),
            'email'=>request()->get('email'),
            'kra_pin'=>request()->get('kra_pin'),
            'image'=>$fileName

        ]);
        return redirect('/church/'.$churchs->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $church=Church::find($id);
        $church->delete();
        return redirect('/church');
    }
}
