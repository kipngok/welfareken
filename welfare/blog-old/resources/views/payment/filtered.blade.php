@extends('layouts.app')
@section('content')


<div class="page-header">
  <div class="row">
    <div class="col-sm-10"><h4>Payments</h4></div>
  </div>
  
  <form action="/process" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="url" value="student">
  <div class="row">
    <div class="col-sm-3 half">
      <label>Select School</label>
      <select class="form-control" name="payment">
        <option value="All">All</option>
          @foreach($schools as $school)
          @if(isset($filters['school']) && $filters['school']==$school->id)
          <option value="{{$school->id}}" selected="selected">{{$school->name}}</option>
          @else
          <option value="{{$school->id}}">{{$school->name}}</option>
          @endif
          
          @endforeach
        </select>
    </div>
    <div class="col-sm-3 half">
      <label>Select Grade</label>
      <select class="form-control" name="class">
        <option>All</option>
          @if(isset($filters['class']) && $filters['class']== 'Baby class')
          <option selected="selected">Baby class</option>
          @else
          <option>Baby class</option>
          @endif

          @if(isset($filters['class']) && $filters['class']== 'PP1')
          <option selected="selected">PP1</option>
          @else
          <option>PP1</option>
          @endif
          @if(isset($filters['class']) && $filters['class']== 'PP2')
          <option selected="selected">PP2</option>
          @else
          <option>PP2</option>
          @endif
          @if(isset($filters['class']) && $filters['class']== 'Grade 1')
          <option selected="selected">Grade 1</option>
          @else
          <option>Grade 1</option>
          @endif
          @if(isset($filters['class']) && $filters['class']== 'Grade 2')
          <option selected="selected">Grade 2</option>
          @else
          <option>Grade 2</option>
          @endif
          @if(isset($filters['class']) && $filters['class']== 'Grade 3')
          <option selected="selected">Grade 3</option>
          @else
          <option>Grade 3</option>
          @endif
          @if(isset($filters['class']) && $filters['class']== 'Grade 4')
          <option selected="selected">Grade 4</option>
          @else
          <option>Grade 4</option>
          @endif
          @if(isset($filters['class']) && $filters['class']== 'Grade 5')
          <option selected="selected">Grade 5</option>
          @else
          <option>Grade 5</option>
          @endif 
          @if(isset($filters['class']) && $filters['class']== 'Grade 6')
          <option selected="selected">Grade 6</option>
          @else
          <option>Grade 6</option>
          @endif
                    
          @if(isset($filters['class']) && $filters['class']== 'Grade 7')
          <option selected="selected">Grade 7</option>
          @else
          <option>Grade 7</option>
          @endif
          @if(isset($filters['class']) && $filters['class']== 'Grade 8')
          <option selected="selected">Grade 8</option>
          @else
          <option>Grade 8</option>
          @endif
        </select>
    </div>
    <div class="col-sm-3 half">
      <label>Select Subscription</label>
      <select class="form-control" name="subscription">
        @if(isset($filters['subscription']) && $filters['subscription']==1)
        <option value="All" selected="selected">Select subscription</option>
        @else
        <option value="All">Select subscription</option>
        @endif
        @if(isset($filters['subscription']) && $filters['subscription']==1)
        <option value="1" selected="selected">Takes Lunch </option>
        @else
        <option value="1">Takes Lunch </option>
        @endif
        @if(isset($filters['subscription']) && $filters['subscription']==2)
        <option value="2" selected="selected">Takes Tea</option>
        @else
        <option value="2">Takes Tea</option>
        @endif
        @if(isset($filters['subscription']) && $filters['subscription']==3)
        <option value="3" selected="selected">Takes Lunch & Tea</option>
        @else
        <option value="3">Takes Lunch & Tea</option>
        @endif
      </select>
    </div>
    <div class="col-sm-3 half">
      <button type="submit" class="btn btn-sm btn-success btn-block" style="margin-top:35px;">Filter</button>
    </div>
  </div>
  </form>
  </div>

<div class="container" style="margin-left: -10px;">
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
