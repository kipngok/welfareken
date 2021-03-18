@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"><h4>Payments</h4></div>
  </div>
  
  <form action="/process" method="POST">
  	{{csrf_field()}}
  	<input type="hidden" name="url" value="payment">
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

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Customer</th>
					<th class="no-mobile">School</th>
					<th class="no-mobile">Class</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($payments as $payment)
				<tr>
					<td>{{date_format(date_create($payment->date.' '.$payment->time),'dS M Y h:i:s a')}}</td>
					<td>{{$payment->student->name}}</td>
					<td class="no-mobile">{{$payment->student->school->name}}</td>
					<td class="no-mobile">{{$payment->student->class}}</td>
					<td>{{number_format($payment->amount,2)}}</td>
					<td><a href="/payment/{{$payment->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		{{$payments->links()}}
	</div>
</div>
</div>

@endsection
