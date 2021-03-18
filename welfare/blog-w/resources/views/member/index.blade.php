@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>Members</h4></div>
     <div class="col-sm-2">  <a href="/member/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i> Add new member</a></div>
  </div>
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>Image</th>
					<th>First name</th>
					<th>Last name</th>
					<th>ID Number</th>
					<th>Contacts</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($members as $member)
				<tr>
					<td>{{ ++$i }}</td>
					<td> <img src="{{ asset('public/images/' . $member->image) }}" alt="image" height="50px"; width="50px"; /></td>
					<td>{{$member->first_name}}</td>
					<td>{{$member->last_name}}</td>
					<td>{{$member->id_number}}</td>
					<td>{{$member->home_cell_group}}</td>
					<td><a href="/member/{{$member->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		{{$members->links()}}
	</div>
</div>
</div>
@endsection
