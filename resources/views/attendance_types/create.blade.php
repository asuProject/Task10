@extends('layouts.base')

@section('title', __('Add attendance Type'))

@section('contents')

	@if (count($errors) > 0)
		<div class="alert">
			<div class="alert alert-warning">
				<h4>Errors:</h4>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('attendanceType.store') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('attendance Type') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}" placeholder="{{ __('attendance Type') }}">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
	</form>
	
@endsection
