@extends('layouts/admin')
@section('adminContent')

@php
use App\Models\Education;
$perSkill = Education::select('*')->get();
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><a href="" class="btn btn-success" data-toggle="modal" data-target="#commonAddModel"><i class="fa fa-plus"></i> Add New</a>
			</div>
			{{-- Toste --}}
			<div style="display: none;" id="successTost" class="alert alert-success">Your Order Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			{{-- Toste --}}
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-12">
							<table id="datatable" class="commonTable table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156px;">SL No.</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Education Title</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Education Background</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">GPA</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Institute</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Start Date</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Finish Date</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 110px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($perSkill as $item)
								<tr role="row" class="odd" id="commonId{{ $item->eduId }}">
									<td>{{ $loop->index }}</td>
									<td>{{ $item->eduTitle }}</td>
									<td>{{ $item->eduBacg }}</td>
									<td>{{ $item->eduGpa }}</td>
									<td>{{ $item->eduInsti }}</td>
									<td>{{ $item->eduStartingDate }}</td>
									<td>{{ $item->eduEndingDate }}</td>
									<td class="text-left py-0 align-middle">
										<div class="btn-group btn-group-sm text-left">
											<a onclick="editCommon({{ $item->eduId }})" href="javascript:voud(0)" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

											<meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
											<button class="btn btn-danger commonDelete" data-id="{{ $item->eduId }}"><i class="fa fa-trash-o"></i></button>
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

<!-- Modal Add Personal Skills -->
<div class="modal fade" id="commonAddModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Personal Skills</h5>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="commonAddForm">
					@csrf

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">Title</label>
							<input id="commonName" type="text" class="form-control" placeholder="Enter A Personal Skills Name">
						</div>
						<div class="form-group">

							<label for="langName">Background</label>
							<input id="commonBg" type="text" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						<div class="form-group">

							<label for="langName">GPA</label>
							<input id="commonGpa" type="text" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Institute</label>
							<input id="commonInstitute" type="text" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>


						<div class="form-group">

							<label for="langName">Starting Date</label>
							<input id="commonSdate" type="date" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Ending Date</label>
							<input id="commonEdate" type="date" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Add Education Details</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Add Personal Skills -->
<div class="modal fade" id="commonUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Personal Skills</h5>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="updateCommonForm">
					@csrf

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">Title</label>
							<input id="updatecommonName" type="text" class="form-control" placeholder="Enter A Personal Skills Name">
							<input id="updatecommonId" type="hidden" class="form-control" placeholder="Enter A Personal Skills Name">
						</div>
						<div class="form-group">

							<label for="langName">Background</label>
							<input id="updatecommonBg" type="text" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						<div class="form-group">

							<label for="langName">GPA</label>
							<input id="updatecommonGpa" type="text" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Institute</label>
							<input id="updatecommonInstitute" type="text" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>


						<div class="form-group">

							<label for="langName">Starting Date</label>
							<input id="updatecommonSdate" type="date" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Ending Date</label>
							<input id="updatecommonEdate" type="date" class="form-control" placeholder="Enter A Personal Skills Percentese">
						</div>

						
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Update Education Details</button>
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

@include('backend.myAjax.ajaxEducation')
@endsection