@if(count($errors) > 0 )
	@foreach ($errors->all() as $error)
	<p class="alert alert-danger">
		{{$error}}
	</p>
	@endforeach
@endif

@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
@endif