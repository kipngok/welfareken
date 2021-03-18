@extends('layouts.app')
@section('content')


<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Search Results</h4></div>
<div class="col-sm-2">
<a href="/student/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i> Add new</a>
</div>
		
	</div>
 
<div class="row">
<div class="col-sm-6">
<form action="/search" method="POST">
                    {{csrf_field()}}

                    <div class="input-group mb-3">
  <input type="text" name="search" class="form-control" placeholder="Search for student" value="{{$searchTerm}}">
  <div class="input-group-append" style="z-index: 1;">
    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
  </div>
</div>
                </form>
              </div>
            </div>

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
