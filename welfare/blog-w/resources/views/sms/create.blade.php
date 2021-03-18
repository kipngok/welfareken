@extends('layouts.app')
@section('content')
<div class="page-header">
  <div class="row">
    <div class="col-sm-10"><h4>Send SMS</h4></div>
  </div>
  
  </div>
<div class="container">
<div class="row">
 
  <div class="col-sm-6">
    <form action="/sms" method="POST">
      {{csrf_field()}}

<!-- 
 <div class="form-group">
      <label>Select School</label>
      <select class="form-control" name="member">
        <option value="All">All</option>
          @foreach($members as $member)
          <option value="{{$member->id}}">{{$member->first_name}}</option>
          @endforeach
        </select>
    </div> -->

    <div class="form-group">
      <label>Select Members</label>
     <input class="form-control" type="text" name="contact">
    </div>
      <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" rows="5" name="sms"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Send message</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection