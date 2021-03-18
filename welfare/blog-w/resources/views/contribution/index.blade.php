@extends('layouts.app')
@section('content')

<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>church</h4></div>
     <div class="col-sm-2">  <a href="/church/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i>Add church</a></div>
  </div>
 </div>
<div class="row">
<div class="container"> 
  
 <table class="table table-bordered">
  <thead>
      <tr>
        <th>NO</th>
					<th>LOGO</th>
					<th>CHURCH NAME</th>
					<th>CONTACT</th>
					<th>EMAIL</th>
					<th>KRA PIN</th>
          <th>ACTION</th>
        
        </tr>
  </thead>
     @foreach($church as $church)
				 <td>{{ ++$i }}</td>
				<td> <img src="{{ asset('public/images/' . $church->image) }}" alt="image" height="50px"; width="50px"; /> </td>
					<td>{{$church->church_name}}</td>
					<td>{{$church->contact}}</td>
					<td>{{$church->email}}</td>
					<td>{{$church->kra_pin}}</td>
					<td><a href="/church/{{$church->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
        
      </tbody>
  </tbody>
</table>

</div>
</div>


@endsection
