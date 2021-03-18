@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4></h4></div>
  </div>
  
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
   <div class="btn-group mb-3">
    <a href="/student/{{$payment->student->id}}" class="btn btn-sm btn-info "><i class="fa fa-chevron-left"></i> Back to student</a>
    <a href="/payment" class="btn btn-sm btn-warning"><i class="fa fa-chevron-left"></i> Back to payment</a>
  </div>
  	<table class="table table-condensed table-striped table-bordered">
  		<tbody>
  			<tr>
  				<th>Student</th>
  				<td>{{$payment->student->name}}</td>
  			</tr>
  			<tr>
  				<th>Date</th>
  				<td>{{date_format(date_create($payment->date.' '.$payment->time),'dS M Y h:i:s a')}}</td>
  			</tr>
  			<tr>
  				<th>Narrative</th>
  				<td>{{$payment->narrative}}</td>
  			</tr>
  			<tr>
  				<th>Amount</th>
  				<td>{{number_format($payment->amount,2)}}</td>
  			</tr>
  			<tr>
  				<th>Mode</th>
  				<td>{{$payment->payment_mode}}</td>
  			</tr>
  			<tr>
  				<th>Served by</th>
  				<td>{{$payment->user->name}}</td>
  			</tr>
  		</tbody>
  	</table>

<form action="/payment/{{$payment->id}}" method="POST">
  		{{csrf_field()}}
  		<input type="hidden" name="_method" value="DELETE">
  		<div class="btn btn-group">
  			<a href="/payment/{{$payment->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
  			<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
  		</div>
  	</form>

  </div>
</div>
</div>
@endsection
