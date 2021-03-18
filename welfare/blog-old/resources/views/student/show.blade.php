@extends('layouts.app')
@section('content')


<div class="page-header">
    <div class="row">
    <div class="col-sm-10"><h4>Student</h4></div>
  </div>
 
</div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <a href="/student" class="btn btn-sm btn-info mb-3"><i class="fa fa-chevron-left"></i> Back to students</a>
  		<table class="table table-condensed table-striped table-bordered">
  		<tbody>
  			<tr>
  				<th>Name</th>
  				<td>{{$student->name}}</td>
  			</tr>
  			<tr>
  				<th>School</th>
  				<td>{{$student->school->name}}</td>
  			</tr>
  			<tr>
  				<th>Class</th>
  				<td>{{$student->class}}</td>
  			</tr>
  			<tr>
  				<th>Parent name</th>
  				<td>{{$student->parent_name}}</td>
  			</tr>
  			<tr>
  				<th>Parent phone</th>
  				<td>{{$student->parent_phone}}</td>
  			</tr>
  			<tr>
  				<th>Take tea</th>
  				<td>@if($student->takes_tea==1)
  					<i class="fa fa-check"></i>
  					@else
  					<i class="fa fa-times"></i>
  					@endif</td>
  			</tr>
  			<tr>
  				<th>Takes lunch</th>
  				<td>@if($student->takes_lunch==1)
  					<i class="fa fa-check"></i>
  					@else
  					<i class="fa fa-times"></i>
  					@endif
  					</td>
  			</tr>
        <tr>
          <th>Balance</th>
          <td>{{number_format($student->balance,2)}}</td>
        </tr>
  		</tbody>
  	</table>
  	<form action="/student/{{$student->id}}" method="POST">
  		{{csrf_field()}}
  		<input type="hidden" name="_method" value="DELETE">
  		<div class="btn btn-group">
  			<a href="/invoice/{{$student->id}}/create" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Add invoice</a>
  			<a href="/payment/{{$student->id}}/create" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Add payment</a>
  			<a href="/student/{{$student->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
  			<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
  		</div>
  	</form>

  </div>

  <div class="col-sm-6">
  	

  	<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">Invoices</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Payments</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab"> 

<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Amount</th>
					<th>Balance</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($student->invoices as $invoice)
				<tr>
					<td>{{date_format(date_create($invoice->date.' '.$invoice->time),'dS M Y h:i:s a')}}</td>
					<td>{{number_format($invoice->amount,2)}}</td>
					<td>{{number_format($invoice->balance,2)}}</td>
					<td><a href="/invoice/{{$invoice->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>

  </div>
  <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
  	
  	<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($student->payments as $payment)
				<tr>
					<td>{{date_format(date_create($payment->date.' '.$payment->time),'dS M Y h:i:s a')}}</td>
					<td>{{number_format($payment->amount,2)}}</td>
					<td><a href="/payment/{{$payment->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
				
			</tbody>
		</table>

  </div>
</div>

  </div>
</div>
</div>
@endsection
