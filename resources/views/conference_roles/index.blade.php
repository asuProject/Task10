@extends('layouts.base')

@section('title', __('conference Roles'))

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
			<th>{{ __('conference Roles') }}</th>
			<th>{{ __('Options') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($roles as $i=>$role)
			<tr>
				<td>{{++$i}}</td>
				<td>{{$role->role}}</td>
				<td><a href="{{ route('conferenceRole.edit' , $role->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					<div style="display: inline-block;">
						<form action="{{ route('conferenceRole.destroy',$role->id) }}" method="post" onsubmit="return confirm('{{__('Delete conference Confirmation')}}')">
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
