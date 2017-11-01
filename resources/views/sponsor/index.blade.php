@extends('layouts.base')

@section('title', __('sponsors'))

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
<? $i=0; ?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>{{__('#')}}</th>
			<th>{{ __('sponsor name') }}</th>
			<th>{{ __('place') }}</th>
			<th>{{ __('email') }}</th>
			<th>{{ __('phone') }}</th>
			<th>{{ __('website') }}</th>
			<th>{{ __('comments') }}</th>
			<th>{{ __('Options') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($sponsors as $i=>$sponsor)
			<tr>
				<td>{{++$i}}</td>
				<td>{{$sponsor->name}}</td>
				<td>{{$sponsor->Country->name}} - {{$sponsor->Town->name}}</td>
				<td>{{$sponsor->email}}</td>
				<td>{{$sponsor->phone}}</td>
				<td>{{$sponsor->website}}</td>
				<td>{{$sponsor->comments}}</td>
				<td><a href="{{ route('sponsor.edit' , $sponsor->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					<div style="display: inline-block;">
						<form action="{{ route('sponsor.destroy',$sponsor->id) }}" method="post" onsubmit="return confirm('{{__('Delete sponsor Confirmation')}}')">
						{{csrf_field()}}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger btn-xs icon-button"><span class="glyphicon glyphicon-remove"></span></button>
						</form>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
	
@endsection
