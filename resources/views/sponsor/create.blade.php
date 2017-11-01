@extends('layouts.base')

@section('title', __('Add sponsor'))

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

<SCRIPT LANGUAGE="JavaScript">
	function get_cities(country_id){
			var options = '';
			var url = '{!! route('town.ajax.get') !!}';
			var city = $('#city');
      	$.post(url,
	        {'_token': $('meta[name=csrf-token]').attr('content'),
	        'country_id': country_id},
	        	function(data){
				 	var towns = data.towns;
				 	$.each(towns , function(index,value){
				 		var option = '<option value="'+value.id+'">'+value.name+'</option>';
				 		options += option;
				 	});
				 	city.empty().html(options);
        });
  	}
  </SCRIPT>

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('sponsor.store') }}">
		{{ csrf_field() }}

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('sponsor name') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('sponsor name') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('sponsor address') }} ( {{ __('country') }} )</label>
			<div class="col-md-3">
			<select name="country_id" required  onchange='get_cities(this.value)'>
				<option value="">{{ __('choose country') }}</option>
				@foreach($countries as $country)
					<option value="{{$country->id}}">{{$country->name}}</option>
				@endforeach
			</select>
			</div>
			<label class="col-md-2 control-label">{{ __('city') }}</label>
			<div class="col-md-3">
			<select name="town_id" required id="city">

			</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('email') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('email') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('phone') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="{{ __('phone') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('website') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}" placeholder="{{ __('website') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('other info') }}</label>
			<div class="col-md-8">
			<textarea name="comments" class="form-control" placeholder="{{ __('other info') }}">{{ old('comments') }}</textarea>
			</div>
		</div>


		<button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
	</form>
	
@endsection
