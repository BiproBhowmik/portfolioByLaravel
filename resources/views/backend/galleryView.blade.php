@extends('layouts/admin')
@section('adminContent')

@php
use App\Models\Gallery;
$galleryImg = Gallery::select('*')->get();
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">

			<div class="panel-heading">
				<a href="" class="btn btn-success" data-toggle="modal" data-target="#langAddModal"><i class="fa fa-plus"></i> Add New</a>
			</div>

			{{-- Toste Start--}}

			<div style="display: none;" id="successTost" class="alert alert-success">Your Ordered Task Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			@if (session("success"))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ session('success') }}
				</div>
			@endif

			{{-- Toste End--}}
			
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-12">
							<table id="datatable" class="langTable table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156px;">SL No.</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Image Title</th>

									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Gallery Image</th>

									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 110px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($galleryImg as $item)
								<tr role="row" class="odd" id="commonId{{ $item->id }}">
									<td>{{ $loop->index }}</td>
									<td>{{ $item->galTitle }}</td>
									<td><img class="img-circle img-thumbnail" alt="profile-image" src="{{ Storage::url($item->galPho) }}" width="20%"></td>
									<td class="text-left py-0 align-middle">
										<div class="btn-group btn-group-sm text-left">
											<meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
											<button class="btn btn-danger commonDelete" data-id="{{ $item->id }}"><i class="fa fa-trash-o"></i></button>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</div>

</div>

<!-- Modal Add Language -->
<div class="modal fade" id="langAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Image</h5>
			</div>
			<div class="modal-body">
				<form class="cmxform form-horizontal tasi-form" id="updateprtTitleForm" method="POST" action="{{ route('addGalaryImage') }}" enctype="multipart/form-data" novalidate="novalidate">
						@csrf

						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Image Title</label>
							<div class="col-lg-10">
								<input class=" form-control" id="imageTitle" name="imageTitle" type="text" required="" aria-required="true" placeholder="Enter Image Name">
							</div>
						</div>
						
						<div class="form-group ">
							<label for="cname" class="control-label col-lg-2">Gallery Image</label>
							<div class="col-lg-10">
								<input class=" form-control" id="profPicture" name="profPicture" type="file" required="" aria-required="true">
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Add Gallery Image</button>
							</div>
						</div>


					</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('extraJS')

<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').dataTable();
	} );
</script>

@include('backend.myAjax.ajaxGallery')

@endsection