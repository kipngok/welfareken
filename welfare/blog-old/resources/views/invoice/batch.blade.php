@extends('layouts.app')
@section('content')
<div class="page-header">
  <div class="row">
    <div class="col-sm-10"><h4>Create batch invoice</h4></div>
  </div>
  
  </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/invoice/saveBatch" method="POST">
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
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="{{date('Y-m-d')}}">
      </div>
      <div class="form-group">
        <label>Time</label>
        <input type="time" name="time" class="form-control" value="{{date('H:i')}}">
      </div>
      <div class="form-group">
        <label>Narrative</label>
        <input type="text" name="narrative" class="form-control">
      </div>

      <div class="form-group">
        <label>Lunch</label>
        <input type="number" name="lunch" class="form-control" id="lunch" value="0">
      </div>

      <div class="form-group">
        <label>Tea</label>
        <input type="number" name="tea" class="form-control" id="tea" value="0">
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