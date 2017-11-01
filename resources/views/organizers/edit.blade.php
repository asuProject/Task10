@extends('layouts.base')

@section('title', __('Edit organizer'))

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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('organizers.update',$organizer->id) }}">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('Organizer Name') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="name" id="name" value="{{ $organizer->name }}" placeholder="{{ __('Organizer Name') }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('Type') }}</label>
			<div class="col-md-2"><input type="radio" name="type" value="1" @if($organizer->type == 1) checked @endif>
			{{ __('faculty') }}</div>
			<div class="col-md-2"><input type="radio" name="type" value="2" @if($organizer->type == 2) checked @endif> {{ __('department') }}</div>
			<div class="col-md-2"><input type="radio" name="type" value="3" @if($organizer->type == 3) checked @endif> {{ __('other') }}</div>
		</div>


		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('Comments') }}</label>
			<div class="col-md-6">
			<textarea class="form-control" name="comments" id="comments" placeholder="{{ __('Comments') }}">{{$organizer->comments}}
			</textarea>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
	</form>
	
@endsection
