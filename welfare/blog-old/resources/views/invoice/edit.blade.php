@extends('layouts.app')
@section('content')
<div class="page-header">
  <div class="row">
    <div class="col-sm-10"><h4>Create invoice</h4></div>
  </div>
  
  </div>
<div class="container" style="margin-left: -10px;">
<div class="row">
  <div class="col-sm-6">
    <form action="/invoice/{{$invoice->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label>Student</label>
       <select class="form-control" name="student_id">
         <option value="{{$student->id}}">{{$student->name}}</option>
       </select>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="{{$invoice->date}}">
      </div>
      <div class="form-group">
        <label>Time</label>
        <input type="time" name="time" class="form-control" value="{{$invoice->time}}">
      </div>
      <div class="form-group">
        <label>Narrative</label>
        <input type="text" name="narrative" class="form-control" value="{{$invoice->narrative}}" required="required">
      </div>
      <div class="form-group">
        <label>Lunch</label>
        <input type="number" name="lunch" class="form-control" id="lunch" value="{{$invoice->lunch}}" @if($student->takes_lunch !=1) readonly="readonly" @endif>
      </div>

      <div class="form-group">
        <label>Tea</label>
        <input type="number" name="tea" class="form-control" id="tea" value="{{$invoice->tea}}" @if($student->takes_tea !=1) readonly="readonly" @endif>
      </div>

      <div class="form-group">
        <label>Amount</label>
        <input type="number" name="amount" class="form-control" readonly="readonly" id="amount" value="{{$invoice->amount}}">
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
  var lunch=$('#lunch').val();
  var tea=$('#tea').val();
  var amount;

  $( "#lunch" ).change(function() {
 calculateAmount();
});
  $( "#tea" ).change(function() {
 calculateAmount();
});

function calculateAmount(){
  amount=lunch+tea;
  $('#amount').val(amount);
}
</script>
@endsection