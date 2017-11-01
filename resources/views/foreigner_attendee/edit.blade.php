@extends('layouts.base')
@section('title', __('Edit Foreigner'))
@section('contents')

<SCRIPT LANGUAGE="JavaScript">
function get_cities(id){
      $.post("{{URL('/')}}/get_cities",
        {'_token': $('meta[name=csrf-token]').attr('content'),
        'id': id},
        function(data){
          $('.city').empty().append(data);
        });
  }
  </SCRIPT>

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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('foreignerAttendee.update',$foreigner->id) }}">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('name') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="name" id="name" value="{{ $foreigner->name }}" placeholder="{{ __('name') }}" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('country') }}</label>
			<div class="col-md-6">
			<select name="country_id" required onchange='get_cities(this.value)'>
				<option value="">{{ __('Choose country') }}</option>
				@foreach($countries as $country)
					<option value="{{$country->id}}" 
					@if($country->id == $foreigner->country_id) selected @endif >{{$country->name}}</option>
				@endforeach
			</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('city') }}</label>
			<div class="col-md-6 city">
			<select name="city_id" class="form-control">
				<option value="">{{ __('Choose city') }}</option>
				@foreach($cities as $city)
					<option value="{{$city->id}}" 
					@if($city->id == $foreigner->city_id) selected @endif >{{$city->name}}</option>
				@endforeach
			</select>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
	</form>
	
@endsection
