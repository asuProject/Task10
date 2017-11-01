@extends('layouts.base')

@section('title', __('Edit city'))

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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('country.city.update',$town->id) }}">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('country') }}</label>
			<div class="col-md-6">
			<select name="country_id" required>
				<option value="">{{ __('choose country') }}</option>
				@foreach($countries as $country)
					<option value="{{$country->id}}" 
					@if($country->id == $town->country_id) selected @endif >{{$country->name}}</option>
				@endforeach
			</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('city name') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="name" id="name" value="{{ $town->name }}" placeholder="{{ __('city name') }}" required>
			</div>
		</div>



		<button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
	</form>
	
@endsection
