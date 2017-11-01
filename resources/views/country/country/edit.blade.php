@extends('layouts.base')

@section('title', __('Edit country'))

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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('country.country.update',$country->id) }}">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('country name') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="name" id="name" value="{{ $country->name }}" placeholder="{{ __('country name') }}" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('country code') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="code" id="code" value="{{ $country->code }}" placeholder="{{ __('country code') }}" required>
			</div>
		</div>


		<button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
	</form>
	
@endsection
