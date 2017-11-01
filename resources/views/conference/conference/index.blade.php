@extends('layouts.base')

@section('title', __('View conferences'))

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
			<th>{{ __('conference name') }}</th>
			<th>{{ __('place') }}</th>
			<th>{{ __('conference date') }}</th>
			<th>{{ __('website') }}</th>
			<th>{{ __('comments') }}</th>
			<th>{{ __('Options') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($conferences as $i=>$conference)
			<tr>
				<td>{{++$i}}</td>
				<td>{{$conference->name}}</td>
				<td>{{$conference->Country->name}} - {{$conference->City->name}}</td>
				<td>{{$conference->start_date}}</td>
				<td>{{$conference->website}}</td>
				<td>{{$conference->comments}}</td>
				<td><a href="{{ route('conference.edit' , $conference->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					<div style="display: inline-block;">
						<form action="{{ route('conference.destroy',$conference->id) }}" method="post" onsubmit="return confirm('{{__('Delete a conference Confirmation')}}')">
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
