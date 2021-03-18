<?php

namespace App\Http\Controllers;

use App\Student;
use App\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schools=School::all();
        $students = Student::orderBy('created_at','desc')->paginate(20);
        return view('student.index',compact('students','schools'));
    }

    public function search(Request $request)
    {
        //
        $input=$request->all();
        $searchTerm=$input['search'];
        $students = Student::where('name','LIKE','%'.$searchTerm.'%')->orderBy('created_at','desc')->paginate(20);
        
        return view('student.search',compact('students','searchTerm'));
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
                ->paginate(20);
        $filters=array();
        $filters['school']=$school_id;
        $filters['class']=$class;
        $filters['subscription']=$subscription;

        return view('student.filtered',compact('students','schools','filters'));
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
        return view('student.create', compact('schools'));
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
        $student=Student::create($input);
        return redirect('/student/'.$student->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student=Student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student=Student::find($id);
        $schools=School::all();
        return view('student.edit', compact('student','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student=Student::find($id);
        $input=$request->all();
        $student->update($input);
        return redirect('/student/'.$student->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student=Student::find($id);
        $student->delete();
        return redirect('/student');
    }
}
