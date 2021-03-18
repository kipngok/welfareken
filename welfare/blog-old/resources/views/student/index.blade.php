@extends('layouts.app')
@section('content')


<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Students</h4></div>
<div class="col-sm-2">
<a href="/student/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i> Add new</a>
</div>
		
	</div>
 
  
  <form action="/process" method="POST">
  	{{csrf_field()}}
  	<input type="hidden" name="url" value="student">
  <div class="row">
  	<div class="col-sm-3 half">
  		<label>Select School</label>
  		<select class="form-control" name="school">
  		  <option value="All">All</option>
          @foreach($schools as $school)
          <option value="{{$school->id}}">{{$school->name}}</option>
          @endforeach
        </select>
  	</div>
  	<div class="col-sm-3 half">
  		<label>Select Grade</label>
  		<select class="form-control" name="class">
  		  <option>All</option>
          <option>Baby class</option>
          <option>PP1</option>
          <option>PP2</option>
          <option>Grade 1</option>
          <option>Grade 2</option>
          <option>Grade 3</option>
          <option>Grade 4</option>
          <option>Grade 5</option>
          <option>Grade 6</option>
          <option>Grade 7</option>
          <option>Grade 8</option>
        </select>
  	</div>
  	<div class="col-sm-3 half">
  		<label>Select Subscription</label>
  		<select class="form-control" name="subscription">
  			<option value="All">Select subscription</option>
  			<option value="3">Takes Lunch & Tea</option>
  			<option value="1">Takes Lunch </option>
  			<option value="2">Takes Tea</option>
  		</select>
  	</div>
  	<div class="col-sm-3 half">
  		<button type="submit" class="btn btn-sm btn-success btn-block" style="margin-top:35px;">Filter</button>
  	</div>
  </div>
  </form>
  </div>

<div class="container" >
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>School</th>
					<th class="no-mobile">Class</th>
					<th class="no-mobile">Status</th>
					<th class="no-mobile">Parent name</th>
					<th class="no-mobile">Phone number</th>
					<th>Balance</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($students as $student)
				<tr>
					<td>{{$student->name}}</td>
					<td>{{$student->school->name}}</td>
					<td class="no-mobile">{{$student->class}}</td>
					<td class="no-mobile">{{$student->status}}</td>
					<td class="no-mobile">{{$student->parent_name}}</td>
					<td class="no-mobile">{{$student->parent_phone}}</td>
					<td>{{number_format($student->balance,2)}}</td>
					<td><a href="/student/{{$student->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		{{$students->links()}}
	</div>
</div>
</div>
@endsection
