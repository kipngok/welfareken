@extends('layouts.app')

@section('content')
    
<div class="container" >
    <div class="row mt-3">
        <div class="col-sm-6">
            <div class="alert alert-info mt-3"> You are logged in as {{Auth::user()->name}}</div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <form action="/search" method="POST">
                    {{csrf_field()}}

                    <div class="input-group mb-3">
  <input type="text" name="search" class="form-control" placeholder="Search for student">
  <div class="input-group-append">
    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
  </div>
</div>
                </form>
            </div>
        </div>
        @if(Auth::user()->is_admin ==1)
        <div class="row">
            <div class="col-sm-6">
                
                
        <div class="card mt-3">
            <div class="card-header"><h4>Summary</h4></div>
            <div class="card-body">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Invoices</th>
                             <th>Payments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Today</th>
                            <td>{{number_format($InvoicesToday,2)}}</td>
                            <td>{{number_format($paymentsToday,2)}}</td>
                        </tr>
                        <tr>
                            <th>This Week</th><td>{{number_format($InvoicesThisWeek,2)}}</td>
                            <td>{{number_format($paymentsThisWeek,2)}}</td>
                        </tr>
                        <tr>
                            <th>Last Week</th><td>{{number_format($InvoicesLastWeek,2)}}</td>
                            <td>{{number_format($paymentsLastWeek,2)}}</td>
                        </tr>
                        <tr>
                            <th>This Month</th><td>{{number_format($InvoicesThisMonth,2)}}</td>
                            <td>{{number_format($paymentsThisMonth,2)}}</td>
                        </tr>
                        <tr>
                            <th>Last Month</th><td>{{number_format($InvoicesLastMonth,2)}}</td>
                            <td>{{number_format($paymentsLastMonth,2)}}</td>
                        </tr>
                        <tr>
                            <th>This Year</th><td>{{number_format($InvoicesThisYear,2)}}</td>
                            <td>{{number_format($paymentsThisYear,2)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
       </div>
      
   </div>
   <div class="col-sm-4">
       <div class="card mt-3">
        <div class="card-header"><h4>Total Students</h4></div>
        <div class="card-body">
            <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>School</th>
                            <th>Number of students</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schools as $school)
                        <tr>
                            <th>{{$school->name}}</th>
                            <td>{{$school->students->count()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
       </div>
   </div>
</div>
 @endif
</div>
@endsection

