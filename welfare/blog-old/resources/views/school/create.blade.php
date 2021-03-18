@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4>Create school</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/school" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label>School name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
