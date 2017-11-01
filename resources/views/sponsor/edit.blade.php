@extends('layouts.base')

@section('title', __('Edit plan'))

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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('sponsor.update',$sponsors->id) }}">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('sponsor name') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="name" id="name" value="{{ $sponsors->name }}" placeholder="{{ __('sponsor name') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('sponsor address') }} ( {{ __('country') }} )</label>
			<div class="col-md-3">
			<select name="country_id" required  onchange='get_cities(this.value)'>
				<option value="">{{ __('choose country') }}</option>
				@foreach($countries as $country)
					<option value="{{$country->id}}" @if($country->id == $sponsors->country_id) selected @endif>
					{{$country->name}}</option>
				@endforeach
			</select>
			</div>
			<label class="col-md-2 control-label">{{ __('city') }}</label>
			<div class="col-md-3">
			<select name="town_id" required id="city">
				<option value="">{{ __('choose city') }}</option>
				@foreach($towns as $town)
					<option value="{{$town->id}}" 
					@if($town->id == $sponsors->town_id) selected @endif>{{$town->name}}</option>
				@endforeach
			</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('email') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="email" id="email" value="{{ $sponsors->email }}" placeholder="{{ __('email') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('phone') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="phone" id="phone" value="{{ $sponsors->phone }}" placeholder="{{ __('phone') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('website') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="website" id="website" value="{{ $sponsors->website }}" placeholder="{{ __('website') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('other info') }}</label>
			<div class="col-md-8">
			<textarea name="comments" class="form-control" placeholder="{{ __('other info') }}">{{ $sponsors->comments }}</textarea>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
	</form>
	
@endsection
