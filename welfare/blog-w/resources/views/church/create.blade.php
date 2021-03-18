@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4>Create Church</h4></div>
  </div>
  
  </div>
 
<div class="container">
<div class="row">
  <div class="col-sm-6">
       @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/church" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label>Church name</label>
        <input type="text" name="church_name" class="form-control">
      </div>
      
       <div class="form-group">
        <label>Contacts</label>
        <input type="text" name="contact" class="form-control">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label>KRA pin</label>
        <input type="text" name="kra_pin" class="form-control">
      </div>
       <div class="form-group">
        <label>Location</label>
        <input type="text" name="volume_size" class="form-control">
      </div>
      <div class="form-group">
        <label>Church logo Image</label>
        <input type="file" name="image" class="form-control">
      </div>


      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
