@extends('layouts.app')
@section('content')
<div class="page-header">
  <div class="row">
    <div class="col-sm-10"><h4>Send Bulk SMS</h4></div>
  </div>
  
  </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/sms" method="POST">
      {{csrf_field()}}

    <div class="form-group">
      <label>Select School</label>
      <select class="form-control" name="school">
        <option value="All">All</option>
          @foreach($schools as $school)
          <option value="{{$school->id}}">{{$school->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
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
    <div class="form-group">
      <label>Select Subscription</label>
      <select class="form-control" name="subscription">
        <option value="All">Select subscription</option>
        <option value="3">Takes Lunch & Tea</option>
        <option value="1">Takes Lunch </option>
        <option value="2">Takes Tea</option>
      </select>
    </div>

      <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" rows="5" name="message"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Send message</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection