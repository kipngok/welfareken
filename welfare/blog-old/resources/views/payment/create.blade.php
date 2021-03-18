@extends('layouts.app')
@section('content')
<div class="page-header">

    <div class="row">
    <div class="col-sm-10"><h4>Create payment</h4></div>
  </div>
 
  </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/payment" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label>Student</label>
       <select class="form-control" name="student_id">
         <option value="{{$student->id}}">{{$student->name}}</option>
       </select>
      </div>

      <div class="form-group">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="{{date('Y-m-d')}}">
      </div>
      <div class="form-group">
        <label>Time</label>
        <input type="time" name="time" class="form-control" value="{{date('H:i')}}">
      </div>
      <div class="form-group">
        <label>Narrative</label>
        <input type="text" name="narrative" class="form-control" required="required">
      </div>
      
      <div class="form-group">
        <label>Amount</label>
        <input type="text" name="amount" class="form-control">
      </div>

      <div class="form-group">
        <label>Payment mode </label>
       <select class="form-control" name="payment_mode">
         <option>Cash</option>
         <option>Mobile Money</option>
         <option>Cheque</option>
         <option>Card</option>
       </select>
      </div>
      <div class="form-group">
        <label>Transaction Code</label>
        <input type="text" name="code" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
