@extends('layouts/admin')
@section('adminContent')

@php
use App\Models\Languese;
$languese = Languese::select('*')->get();
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><a href="" class="btn btn-success" data-toggle="modal" data-target="#langAddModal"><i class="fa fa-plus"></i> Add New</a>
			</div>
			{{-- Toste --}}
			<div style="display: none;" id="successTost" class="alert alert-success">Your Order Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			{{-- Toste --}}
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-12">
							<table id="datatable" class="langTable table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156px;">SL No.</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Languese Name</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 110px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($languese as $item)
								<tr role="row" class="odd" id="langId{{ $item->lanId }}">
									<td>{{ $loop->index }}</td>
									<td>{{ $item->lanName }}</td>
									<td class="text-left py-0 align-middle">
										<div class="btn-group btn-group-sm text-left">
											<a onclick="editLanuese({{ $item->lanId }})" href="javascript:voud(0)" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

											<meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
											<button class="btn btn-danger langDelete" data-id="{{ $item->lanId }}"><i class="fa fa-trash-o"></i></button>
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
				<h5 class="modal-title" id="staticBackdropLabel">Add New Language</h5>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="addLangForm">
					@csrf

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">Language</label>
							<input id="langName" type="text" class="form-control" placeholder="Enter A Language Name">
						</div>
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Add Language</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Add Language -->
<div class="modal fade" id="langUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Language</h5>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="updateLangForm">
					@csrf

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">Language</label>
							<input id="updatelangName" type="text" class="form-control" placeholder="Enter A Language Name">
							<input id="updatelangId" type="hidden" class="form-control" placeholder="Enter A Language Name">
						</div>
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Update Language</button>
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


@include('backend.myAjax.ajaxLanguage')
@endsection