@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>SMS</h4></div>
     <div class="col-sm-2">  <a href="/sms/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i>Send Bulk SMS</a></div>
  </div>
 
 
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Student</th>
					<th>Message</th>
				</tr>
			</thead>
			<tbody>
				@foreach($smses as $sms)
				<tr>
					<td>{{date_format(date_create($sms->date.' '.$sms->time),'dS M Y h:ia')}}</td>
					<td>{{$sms->student->name}}</td>
					<td>{{$sms->sms}}</td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		{{$smses->links()}}
	</div>
</div>
</div>
@endsection
