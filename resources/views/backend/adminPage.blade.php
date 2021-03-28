
@if (session('username') && session('code'))
	@include('backend.adminContent')
@else
	@include('backend.505')
@endif
