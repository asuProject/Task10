@extends('layouts.base')

@section('title', __('Add department'))

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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('departments.store') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('description') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="{{ __('description') }}" required>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
	</form>
	
@endsection
