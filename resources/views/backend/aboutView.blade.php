@extends('layouts/admin')
@section('cxtraCss')
<!-- summernote css/js in ABOUTVIEW PAGE -->
<!-- include libraries(jQuery, bootstrap)  -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection

@section('adminContent')

@php
use App\Models\About;
$about = About::select('*')->first();
@endphp

@if ($about)

{{-- Toste --}}
            <div style="display: none;" id="successTost" class="alert alert-success">Your Order Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
            {{-- Toste --}}

<div class="container">
    <div class="row">
        <div class="col-md-7 offset-3 mt-4">
            <div class="card-body">

                <form id="updateAboutForm" method="post" action="">
                    @csrf
                    <input type="hidden" name="" id="abtId" value="{{ $about->abtId }}">
                    <div class="form-group">
                        <textarea class="form-control" name="summernote" id="summernote"> {{ $about->abtText }} </textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Update About</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

@else

<div class="container">
    <div class="row">
        <div class="col-md-7 offset-3 mt-4">
            <div class="card-body">

                <form id="addAboutForm" method="post" action="" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="summernote" id="summernote"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Add About</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endif

@endsection

@section('extraJS')
<!-- summernote css/js in ABOUTVIEW PAGE -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
<!-- summernote css/js in ABOUTVIEW PAGE -->
@endsection