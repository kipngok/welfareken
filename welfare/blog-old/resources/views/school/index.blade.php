@extends('layouts.app')
@section('content')


<div class="page-header">
	<div class="row">
		<div  class="col-sm-10"><h4>Schools</h4></div>
		<div class="col-sm-2"> <a href="/school/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i> Add new</a></div>
	</div>
   </div>

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($schools as $school)
				<tr>
					<td>{{$school->name}}</td>
					<td><a href="/school/{{$school->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach

			</tbody>
		</table>
						{{$schools->links()}}
	</div>
</div>
</div>

@endsection
