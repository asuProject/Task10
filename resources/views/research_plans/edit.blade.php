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

	<form class="form-horizontal" id="create_form" method="post" action="{{ route('researchPlans.update',$plan->id) }}">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('description') }}</label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="description" id="description" value="{{ $plan->description }}" placeholder="{{ __('description') }}" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">{{ __('department') }}</label>
			<div class="col-md-6">
			<select name="department_id" required>
				<option value="">{{ __('Choose Department') }}</option>
				@foreach($departments as $department)
					<option value="{{$department->id}}" 
					@if($department->id == $plan->department_id) selected @endif >{{$department->description}}</option>
				@endforeach
			</select>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
	</form>
	
@endsection
