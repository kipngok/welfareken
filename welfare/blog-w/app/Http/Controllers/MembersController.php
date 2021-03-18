<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members= Member::orderBy('created_at','desc')->paginate(10);
        return view('member.index', compact('members'))
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
        $members = Member::all();
        return view('member.create', compact('members'));
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
          $members=Member::create($input);
        return redirect('/member/'.$members->id);

       //  $this->validate(request(), [
       //     'first_name'=>'required',
       //     'middle_name'=>'required',
       //     'last_name'=>'required',
       //     'dob'=>'required',
       //     'no_of_children'=>'required',
       //     'id_number'=>'required',
       //     'home_cell_group'=>'required',
       //     'home_cell_leader'=>'required',
       //     'image'=>'required|image|mimes:jpg,jpeg,png,gif'
       //  ]);
       //      $fileName = null;
       //  if (request()->hasFile('image')) {
       //      $file = request()->file('image');
       //      $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
       //      $file->move('./public/images/',$fileName);
       //  }
    
       // $members=Member::create([
       //      'first_name' => request()->get('first_name'),
       //      'middle_name'=>request()->get('middle_name'),
       //      'last_name'=>request()->get('last_name'),
       //      'dob'=>request()->get('dob'),
       //      'no_of_children'=>request()->get('no_of_children'),
       //      'id_number'=>request()->get('id_number'),
       //      'home_cell_group'=>request()->get('home_cell_group'),
       //      'home_cell_leader'=>request()->get('home_cell_leader'),
       //      'partner_first_name'=>request()->get('partner_first_name'),
       //      'partner_middle_name' => request()->get('partner_middle_name'),
       //      'partner_last_name'=>request()->get('partner_last_name'),
       //      'partner_dob'=>request()->get('partner_dob'),
       //      'partner_id_number'=>request()->get('partner_id_number'),
       //      'next_of_kin_first_name'=>request()->get('next_of_kin_first_name'),
       //      'next_of_kin_middle_name'=>request()->get('next_of_kin_middle_name'),
       //      'next_of_kin_last_name'=>request()->get('next_of_kin_last_name'),
       //      'next_of_kin_id_number'=>request()->get('next_of_kin_id_number'),
       //      'date_of_membership'=>request()->get('date_of_membership'),
       //      'image'=>$fileName


       //  ]);
       // dd($members);
        // return redirect('/member/'.$members->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $members=Member::find($id);
        return view('member.show', compact('members'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $members= Member::find($id);
        return view('member.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
         $this->validate(request(), [
           'first_name'=>'required',
           'middle_name'=>'required',
           'last_name'=>'required',
           'dob'=>'required',
           'no_of_children'=>'required',
           'id_number'=>'required',
           'home_cell_group'=>'required',
           'home_cell_leader'=>'required',
           'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
            $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./public/images/',$fileName);
        }
    
       $members=Member::create([
            'first_name' => request()->get('first_name'),
            'middle_name'=>request()->get('middle_name'),
            'last_name'=>request()->get('last_name'),
            'dob'=>request()->get('dob'),
            'no_of_children'=>request()->get('no_of_children'),
            'id_number'=>request()->get('id_number'),
            'home_cell_group'=>request()->get('home_cell_group'),
            'home_cell_leader'=>request()->get('home_cell_leader'),
            'partner_first_name'=>request()->get('partner_first_name'),
            'partner_middle_name' => request()->get('partner_middle_name'),
            'partner_last_name'=>request()->get('partner_last_name'),
            'partner_dob'=>request()->get('partner_dob'),
            'partner_id_number'=>request()->get('partner_id_number'),
            'next_of_kin_first_name'=>request()->get('next_of_kin_first_name'),
            'next_of_kin_middle_name'=>request()->get('next_of_kin_middle_name'),
            'next_of_kin_last_name'=>request()->get('next_of_kin_last_name'),
            'next_of_kin_id_number'=>request()->get('next_of_kin_id_number'),
            'date_of_membership'=>request()->get('date_of_membership'),
            'image'=>$fileName


        ]);
        return redirect('/member/'.$members->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $members=Member::find($id);
        $members->delete();
        return redirect('/member');
    }
}
