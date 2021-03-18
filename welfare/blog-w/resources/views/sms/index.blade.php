@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>SMS</h4></div>
     <div class="col-sm-2">  <a href="/sms/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i>Send Bulk SMS</a></div>
  </div>
 
 
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Member</th>
					<th>Message</th>
				</tr>
			</thead>
	
		</table>
	
	</div>
</div>
</div>
@endsection
