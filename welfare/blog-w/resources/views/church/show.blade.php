@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"> <h4>CHURCH</h4></div>
  </div>
         
          
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <table class="table table-condensed table-striped table-bordered">
      <tbody>
     
      
          <th>CHURCH NAME</th>
          <td>{{$church->church_name}}</td>
        </tr>
       
         <tr>
          <th>KRA PIN</th>
          <td>{{$church->kra_pin}}</td>
        </tr>
         <tr>
          <th>EMAIL</th>
          <td>{{$church->email}}</td>
        </tr>
         <tr>
          <th>CONTACTS</th>
          <td>{{$church->contact}}</td>
        </tr>

         <tr>
        
      </tbody>
    </table>
    <form action="/church/{{$church->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE">
      <div class="btn btn-group">
        <a href="/church/{{$church->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
        <a href="/church" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
      </div>
    </form>
  </div>
   <div class="col-sm-6">
    <table>
        <tr>
          <!-- <th>Image</th> -->
          <td><img src="{{ asset('public/images/' . $church->image) }}" alt="image" height="230px"; width="230px"; /></td>
        </tr>
    </table>
    
  </div>
</div>
</div>
@endsection
