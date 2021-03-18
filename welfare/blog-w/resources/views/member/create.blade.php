@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-4">
		<form action="/member" method="POST">
			{{csrf_field()}}
			<div class="form-group">
			<label>First name</label>
			<input type="text" name="first_name" class="form-control">
			</div>
			<div class="form-group">
			<label>Middle name</label>
			<input type="text" name="middle_name" class="form-control">
			</div>
			<div class="form-group">
			<label>Last name</label>
			<input type="text" name="last_name" class="form-control">
			</div>
			<div class="form-group">
			<label>ID number</label>
			<input type="text" name="id_number" class="form-control">
			</div>
			<div class="form-group">
			<label>Date of birth</label>
			<input type="date" name="dob" class="form-control">
			</div>
			<div class="form-group">
			<label>Home cell group</label>
			<input type="text" name="home_cell_group" class="form-control">
			</div>
			</div>
			<div class="col-sm-4">
			<div class="form-group">
			<label>Partner first name</label>
			<input type="text" name="partner_first_name" class="form-control">
			</div>
			<div class="form-group">
			<label>Partner middle name</label>
			<input type="text" name="partner_middle_name" class="form-control">
			</div>
			<div class="form-group">
			<label>Partner last name</label>
			<input type="text" name="partner_last_name" class="form-control">
			</div>
			<div class="form-group">
			<label>Partner Dob</label>
			<input type="date" name="partner_dob" class="form-control">
			</div>
			<div class="form-group">
			<label>Partner ID number</label>
			<input type="text" name="partner_id_number" class="form-control">
			</div>
			<div class="form-group">
			<label>Next of kin first name</label>
			<input type="text" name="next_of_kin_first_name" class="form-control">
			</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
			<label>Kin middle name</label>
			<input type="text" name="next_of_kin_middle_name" class="form-control">
			</div>
			<div class="form-group">
			<label>Kin lastname</label>
			<input type="text" name="next_of_kin_last_name" class="form-control">
			</div>
			<div class="form-group">
			<label>Kin ID number</label>
			<input type="text" name="next_of_kin_id_number" class="form-control">
			</div>
			<div class="form-group">
			<label>Date of membership</label>
			<input type="date" name="date_of_membership" class="form-control">
			</div>
			<div class="form-group">
			<label>No of children</label>
			<input type="number" name="no_of_children" class="form-control">
			</div>
				<div class="form-group">
			<label>Image</label>
			 <input type="file" name="image" class="form-control">
			</div>
			</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
			</div>
		</form>

	</div>
	</div>
</div>








@endsection
