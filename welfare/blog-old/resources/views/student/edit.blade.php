@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4>Edit student</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/student/{{$student->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{$student->name}}">
      </div>
      <div class="form-group">
        <label>School</label>
        <select class="form-control" name="school_id">
          @foreach($schools as $school)
          @if($school->id == $student->school_id)
          <option value="{{$school->id}}" selected="">{{$school->name}}</option>
          @else
          <option value="{{$school->id}}">{{$school->name}}</option>
          @endif
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Class</label>
        <select class="form-control" name="class">
          @if($student->class == 'Baby class')
          <option selected="selected">Baby class</option>
          @else
          <option>Baby class</option>
          @endif

          @if($student->class == 'PP1')
          <option selected="selected">PP1</option>
          @else
          <option>PP1</option>
          @endif
          @if($student->class == 'PP2')
          <option selected="selected">PP2</option>
          @else
          <option>PP2</option>
          @endif
          @if($student->class == 'Grade 1')
          <option selected="selected">Grade 1</option>
          @else
          <option>Grade 1</option>
          @endif
          @if($student->class == 'Grade 2')
          <option selected="selected">Grade 2</option>
          @else
          <option>Grade 2</option>
          @endif
          @if($student->class == 'Grade 3')
          <option selected="selected">Grade 3</option>
          @else
          <option>Grade 3</option>
          @endif
          @if($student->class == 'Grade 4')
          <option selected="selected">Grade 4</option>
          @else
          <option>Grade 4</option>
          @endif
          @if($student->class == 'Grade 5')
          <option selected="selected">Grade 5</option>
          @else
          <option>Grade 5</option>
          @endif
          @if($student->class == 'Grade 6')
          <option selected="selected">Grade 6</option>
          @else
          <option>Grade 6</option>
          @endif
                    
          @if($student->class == 'Grade 7')
          <option selected="selected">Grade 7</option>
          @else
          <option>Grade 7</option>
          @endif
          @if($student->class == 'Grade 8')
          <option selected="selected">Grade 8</option>
          @else
          <option>Grade 8</option>
          @endif
        </select>
      </div>

      <div class="form-group">
        <label>Parent name</label>
        <input type="text" name="parent_name" class="form-control" value="{{$student->parent_name}}">
      </div>
      <div class="form-group">
        <label>Parent phone</label>
        <input type="text" name="parent_phone" class="form-control" value="{{$student->parent_phone}}">
      </div>

      <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
           @if($student->status == 'Active')
          <option selected="selected">Active</option>
          @else
          <option>Active</option>
          @endif
           @if($student->status == 'Inactive')
          <option selected="selected">Inactive</option>
          @else
          <option>Inactive</option>
          @endif
        </select>
      </div>

      <div class="form-check form-check-inline">
        
      <input type="hidden" name="takes_lunch" value="0">
        @if($student->takes_lunch == 1)
          <input class="form-check-input" type="checkbox" value="1" name="takes_lunch" checked="checked">
          @else
          <input class="form-check-input" type="checkbox" value="1" name="takes_lunch">
          @endif
        <label class="form-check-label">Takes Lunch</label>
      </div>

       <div class="form-check form-check-inline">
        <input type="hidden" name="takes_tea" value="0">
          @if($student->takes_tea= 1)
          <input class="form-check-input" type="checkbox" value="1" name="takes_tea" checked="checked">
          @else
          <input class="form-check-input" type="checkbox" value="1" name="takes_tea">
          @endif
        <label class="form-check-label">Takes Tea</label>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Update</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
