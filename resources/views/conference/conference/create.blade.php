@extends('layouts.base')
@section('title', __('Add conference'))
@section('contents')

<script>
  $(function() {
    $(".datepicker").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-10:+10",
      dateFormat: "yy-mm-dd"
    });
  });
 </script>


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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('conference.store') }}">
		{{ csrf_field() }}

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('conference name') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('conference name') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('conference address') }} ( {{ __('country') }} )</label>
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
			<select name="city_id" required id="city">

			</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('conference date') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control datepicker" name="start_date" id="start_date" value="{{ old('start_date') }}" placeholder="{{ __('conference date') }}" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('conference type') }}</label>
			<div class="col-md-8">
			<select name="type_id" required>
				<option value="">{{ __('choose conference type') }}</option>
				@foreach($types as $type)
					<option value="{{$type->id}}">{{$type->description}}</option>
				@endforeach
			</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('conference organizer') }}</label>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<input type="radio" name="organizer" value="internal"> {{ __('internal conference') }}
				</div>
				<div class="col-md-6">
					<input type="radio" name="organizer" value="external"> {{ __('external conference') }}
				</div>
			</div>
			<select name="organizers_id" style="display: none;" multiple>
				<option value="">{{ __('choose conference organizer') }}</option>
				@foreach($organizers as $organizer)
					<option value="{{$organizer->id}}">{{$organizer->name}}</option>
				@endforeach
			</select>
			</div>
		</div>


		<div class="form-group row">
			<label class="col-md-4 control-label">{{ __('conference website') }}</label>
			<div class="col-md-8">
			<input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}" placeholder="{{ __('conference website') }}" required>
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
