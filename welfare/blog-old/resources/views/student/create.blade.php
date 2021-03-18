@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4>Create students</h4></div>
  </div>
  
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/student" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label>School</label>
        <select class="form-control" name="school_id">
          @foreach($schools as $school)
          <option value="{{$school->id}}">{{$school->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Class</label>
        <select class="form-control" name="class">
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
        <label>Parent name</label>
        <input type="text" name="parent_name" class="form-control">
      </div>
      <div class="form-group">
        <label>Parent phone</label>
        <input type="text" name="parent_phone" class="form-control">
      </div>

      <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
          <option>Active</option>
          <option>Inactive</option>
        </select>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" value="1" name="takes_lunch">
        <label class="form-check-label">Takes Lunch</label>
      </div>

       <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" value="1" name="takes_tea">
        <label class="form-check-label">Takes Tea</label>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
