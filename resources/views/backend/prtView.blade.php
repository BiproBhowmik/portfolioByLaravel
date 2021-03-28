@extends('layouts/admin')
@section('adminContent')

@php
	use App\Models\ProfessionalTitle;
	$prtTitle = ProfessionalTitle::select('*')->first();
@endphp

@if ($prtTitle)
{{-- Showing Information Start --}}

	<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			{{-- Toste --}}
			@if (session("success"))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ session('success') }}
				</div>
			@endif
			{{-- Toste --}}
			<div class="panel-body">
				<div class=" form">
						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Profile Picture</label>
							<div class="col-lg-10">
						<img class="img-circle img-thumbnail" alt="profile-image" src="{{ Storage::url($prtTitle->prtProPic) }}" width="20%">
								
							</div>
						</div>

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Cover Picture</label>
							<div class="col-lg-10">
						<img src="{{ Storage::url($prtTitle->prtCovPic) }}" width="30%">
						
								
							</div>
						</div>

						<input type="hidden" id="prtId" value="{{ $prtTitle->prtId }}">
						
						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Top Name</label>
							<div class="col-lg-10">
								<p class=" form-control">{{ $prtTitle->prtName }}</p>
							</div>
						</div>

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Proffessional Title</label>
							<div class="col-lg-10">
								<p class=" form-control">{{ $prtTitle->prtTitle }}</p>
							</div>
						</div>
				</div> <!-- .form -->
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->

</div>

{{-- Showing Information End --}}

	<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title">Update Information</h3></div>
			<div class="panel-body">
				<div class=" form">
					<form class="cmxform form-horizontal tasi-form" id="updateprtTitleForm" method="POST" action="{{ route('updatePetTitle') }}" enctype="multipart/form-data" novalidate="novalidate">
						@csrf
						<input type="hidden" id="prtId" name="prtId" value="{{ $prtTitle->prtId }}">
						
						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Update Top Name</label>
							<div class="col-lg-10">
								<input class=" form-control" id="prtName" name="prtName" type="text" value="{{ $prtTitle->prtName }}" required="" aria-required="true">
							</div>
						</div>

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Update Proffessional Title</label>
							<div class="col-lg-10">
								<input class=" form-control" id="prtTitle" name="prtTitle" type="text" value="{{ $prtTitle->prtTitle }}" required="" aria-required="true">
							</div>
						</div>

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Update Profile Picture</label>
							<div class="col-lg-10">
								<input class=" form-control" id="profPicture" name="profPicture" type="file" required="" aria-required="true">
							</div>
						</div>

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Update Cover Picture</label>
							<div class="col-lg-10">
								<input class=" form-control" id="covPicture" name="covPicture" type="file" required="" aria-required="true">
							</div>
						</div>

						
						
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Update Proffessional Title</button>
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
					<form class="cmxform form-horizontal tasi-form" id="addprtTitleForm" method="post" action="{{ route('addGalaryImage') }}" enctype="multipart/form-data" novalidate="novalidate">
						@csrf

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Top Name</label>
							<div class="col-lg-10">
								<input class=" form-control" id="prtName" name="prtName" type="text" required="" aria-required="true">
							</div>
						</div>
						
						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Proffessional Title</label>
							<div class="col-lg-10">
								<input class=" form-control" id="prtTitle" name="prtTitle" type="text" required="" aria-required="true">
							</div>
						</div>

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Profile Picture</label>
							<div class="col-lg-10">
								<input class=" form-control" id="profPicture" name="profPicture" type="file" required="" aria-required="true">
							</div>
						</div>

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Cover Picture</label>
							<div class="col-lg-10">
								<input class=" form-control" id="covPicture" name="covPicture" type="file" required="" aria-required="true">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Add Proffessional Title</button>
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