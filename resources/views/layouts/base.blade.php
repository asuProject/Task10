@extends('layouts.main')

@section('content')
    <br>
    <div class="container" dir="@if(App::isLocale('ar')){!! 'rtl' !!}@endif" id="myapp">
        <div class="panel panel-default" style="width: 1000px; background: #fff; padding-bottom: 5px;">
            <div class="panel-heading"><h3><strong>@yield('title')</strong></h3></div>
            <div class="panel-body">
                @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert-class') }}">
                        <button class="close" data-dismiss="alert">x</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
    @yield('contents')


            </div>
        </div>
    </div>
@endsection
