@extends('layouts/admin')
@section('adminContent')

@php
use App\Models\PersonalInfo;
$perInfo = PersonalInfo::select('*')->first();
@endphp

@if ($perInfo)
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">

			{{-- Toste --}}
			<div style="display: none;" id="successTost" class="alert alert-success">Your Order Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			{{-- Toste --}}

			<div class="panel-body">
				<div class=" form">
					<form class="cmxform form-horizontal tasi-form" id="updatePerInfoForm" method="POST" action="" novalidate="novalidate">
						@csrf

						<input type="hidden" id="piId" value="{{ $perInfo->piId }}">
						
						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Full Name</label>
							<div class="col-lg-10">
								<input class=" form-control" id="fullName" name="fullName" type="text" value="{{ $perInfo->fullName }}" required="" aria-required="true">
							</div>
						</div>
						<div class="form-group ">
							<label for="curl" class="control-label col-lg-2">Phone</label>
							<div class="col-lg-10">
								<input value="{{ $perInfo->mobile }}" class="form-control " id="phone" type="text" name="phone">
							</div>
						</div>
						<div class="form-group ">
							<label for="cemail" class="control-label col-lg-2">E-Mail</label>
							<div class="col-lg-10">
								<input value="{{ $perInfo->email }}" class="form-control " id="email" type="email" name="email" required="" aria-required="true">
							</div>
						</div>

						<div class="form-group ">
							<label for="ccomment" class="control-label col-lg-2">Location</label>
							<div class="col-lg-10">
								<textarea class="form-control " id="location" name="location" required="" aria-required="true">{{ $perInfo->location }}</textarea>
							</div>
						</div>

						<div class="form-group ">
							<label for="cemail" class="control-label col-lg-2">Date of Birth</label>
							<div class="col-lg-10">
								<input value="{{ $perInfo->dob }}" class="form-control " id="dob" type="date" name="email" required="" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Update Personal Info</button>
							</div>
						</div>
					</form>
				</div> <!-- .form -->
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->

</div>
@else
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title">Form validations</h3></div>
			<div class="panel-body">
				<div class=" form">
					<form class="cmxform form-horizontal tasi-form" id="addPerInfoForm" method="get" action="" novalidate="novalidate">
						@csrf
						
						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Full Name</label>
							<div class="col-lg-10">
								<input class=" form-control" id="fullName" name="fullName" type="text" required="" aria-required="true">
							</div>
						</div>
						<div class="form-group ">
							<label for="curl" class="control-label col-lg-2">Phone</label>
							<div class="col-lg-10">
								<input class="form-control " id="phone" type="text" name="phone">
							</div>
						</div>
						<div class="form-group ">
							<label for="cemail" class="control-label col-lg-2">E-Mail</label>
							<div class="col-lg-10">
								<input class="form-control " id="email" type="email" name="email" required="" aria-required="true">
							</div>
						</div>

						<div class="form-group ">
							<label for="ccomment" class="control-label col-lg-2">Location</label>
							<div class="col-lg-10">
								<textarea class="form-control " id="location" name="location" required="" aria-required="true"></textarea>
							</div>
						</div>

						<div class="form-group ">
							<label for="cemail" class="control-label col-lg-2">Date of Birth</label>
							<div class="col-lg-10">
								<input class="form-control " id="dob" type="date" name="email" required="" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Add Personal Info</button>
							</div>
						</div>
					</form>
				</div> <!-- .form -->
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->

</div>
@endif

@endsection