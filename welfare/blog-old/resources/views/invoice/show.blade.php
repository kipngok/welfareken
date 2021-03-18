@extends('layouts.app')
@section('content')


<div class="page-header">
  <div class="row">
    <div class="col-sm-12">
  <h4>Invoice</h4>
</div>
</div>
  </div>

<div class="container" >
<div class="row">
  <div class="col-sm-6">
    <div class="btn-group mb-3">
    <a href="/student/{{$invoice->student->id}}" class="btn btn-sm btn-info "><i class="fa fa-chevron-left"></i> Back to student</a>
    <a href="/invoice" class="btn btn-sm btn-warning"><i class="fa fa-chevron-left"></i> Back to invoices</a>
  </div>
    <table class="table table-condensed table-striped table-bordered">
      <tbody>
        <tr>
          <th>Student</th>
          <td>{{$invoice->student->name}}</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>{{date_format(date_create($invoice->date.' '.$invoice->time),'dS M Y h:i:s a')}}</td>
        </tr>
        <tr>
          <th>Narrative</th>
          <td>{{$invoice->narrative}}</td>
        </tr>
         <tr>
          <th>Lunch</th>
          <td>{{number_format($invoice->lunch,2)}}</td>
        </tr>
         <tr>
          <th>Tea</th>
          <td>{{number_format($invoice->tea,2)}}</td>
        </tr>
        <tr>
          <th>Amount</th>
          <td>{{number_format($invoice->amount,2)}}</td>
        </tr>
         <tr>
          <th>Balance</th>
          <td>{{number_format($invoice->balance,2)}}</td>
        </tr>
        <tr>
          <th>Served by</th>
          <td>{{$invoice->user->name}}</td>
        </tr>
      </tbody>
    </table>

<form action="/invoice/{{$invoice->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE">
      <div class="btn btn-group">
        <a href="/invoice/{{$invoice->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
