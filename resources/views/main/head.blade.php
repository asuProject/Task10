<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="Author" CONTENT="ASU-EPS">
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'EPS-ASU') }}</title>

<!-- Styles & Bootstrap -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Jquery -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
<script src="{{asset('main/js/jquery-1.10.2.js')}}"></script>
<!-- modernizr -->
<script src="{{asset('main/js/modernizr.min.js')}}"></script>
<!-- ASU Style -->
<link rel="stylesheet" href="{{ asset('main/css/foundation.min.css') }}">
<link rel="stylesheet" href="{{ asset('main/css/asuapp.css') }}">
<link rel="stylesheet" href="{{ asset('main/css/common.css') }}">

{{--arabic styles--}}
@if(App::isLocale('ar'))
    <link href="{{asset('main/css/arabic.css')}}" rel="stylesheet">
@endif
{{--EPS style--}}
<link rel="stylesheet" href="{{ asset('main/css/eps.css') }}">