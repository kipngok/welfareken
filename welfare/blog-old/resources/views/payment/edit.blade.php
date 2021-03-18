@extends('layouts.app')
@section('content')
<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4>Create payment</h4></div>
  </div>
  <h4>Create payment</h4>
  </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/payment/{{$payment->id}}" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label>Student</label>
       <select class="form-control" name="student_id">
         <option value="{{$student->id}}">{{$student->name}}</option>
       </select>
      </div>

      <div class="form-group">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="{{$payment->date}}">
      </div>
      <div class="form-group">
        <label>Time</label>
        <input type="time" name="time" class="form-control" value="{{$payment->time}}">
      </div>
      <div class="form-group">
        <label>Narrative</label>
        <input type="text" name="narrative" class="form-control" value="{{$payment->narrative}}" required="required">
      </div>
        <div class="form-group">
        <label>Amount</label>
        <input type="text" name="amount" class="form-control" value="{{$payment->amount}}">
      </div>
      <div class="form-group">
        <label>Payment mode </label>
       <select class="form-control" name="payment_mode">
        @if($payment->payment_mode=='Cash')
        <option selected="selected">Cash</option>
        @else
        <option>Cash</option>
        @endif

        @if($payment->payment_mode=='Mobile Money')
        <option selected="selected">Mobile Money</option>
        @else
        <option>Mobile Money</option>
        @endif

        @if($payment->payment_mode=='Cheque')
        <option selected="selected">Cheque</option>
        @else
        <option>Cheque</option>
        @endif

        @if($payment->payment_mode=='Card')
        <option selected="selected">Card</option>
        @else
        <option>Card</option>
        @endif
         
       </select>
      </div>
      <div class="form-group">
        <label>Transaction Code</label>
        <input type="text" name="code" class="form-control" value="{{$payment->code}}">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Update</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
