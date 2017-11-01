@extends('layouts.base')

@section('title', __('Add organizer'))

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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('organizers.store') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('Organizer Name') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('Organizer Name') }}" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('Organizer Type') }}</label>
			<div class="col-md-2"><input type="radio" name="type" value="1"> {{ __('faculty') }}</div>
			<div class="col-md-2"><input type="radio" name="type" value="2"> {{ __('department') }}</div>
			<div class="col-md-2"><input type="radio" name="type" value="3"> {{ __('other') }}</div>
		</div>


		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('Comments') }}</label>
			<div class="col-md-6">
			<textarea class="form-control" name="comments" id="comments" placeholder="{{ __('Comments') }}">{{ old('comments') }}
			</textarea>
			</div>
		</div>



		<button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
	</form>
	
@endsection
