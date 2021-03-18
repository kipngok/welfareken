@extends('layouts.app')
@section('content')
<div class="page-header">
  <div class="row">
    <div class="col-sm-10"><h4>Create invoice</h4></div>
  </div>
  
  </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/invoice" method="POST">
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
        <label>Lunch</label>
        <input type="number" name="lunch" class="form-control" id="lunch" value="0" @if($student->takes_lunch !=1) readonly="readonly" @endif>
      </div>

      <div class="form-group">
        <label>Tea</label>
        <input type="number" name="tea" class="form-control" id="tea" value="0" @if($student->takes_tea !=1) readonly="readonly" @endif>
      </div>

      <div class="form-group">
        <label>Amount</label>
        <input type="number" name="amount" class="form-control" readonly="readonly" id="amount">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  $( "#lunch").change(function() {
 calculateAmount();
});
  $( "#tea" ).change(function() {
 calculateAmount();
});

function calculateAmount(){
  var lunch=$('#lunch').val();
  var tea=$('#tea').val();
  var amount;

  amount=parseInt(lunch)+parseInt(tea);
  console.log('Lunch'+lunch);
  console.log('tea'+tea);
  console.log('amout'+amount);
  $('#amount').val(amount);
}
</script>
@endsection