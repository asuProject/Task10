<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('main.head')

    @stack('styles')
</head>

<body>

<div id="app">
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).foundation();
            $(".inner-wrap, .left-off-canvas-menu, .main-section").height($(window).height() - $(".fixed").height());
        })
    </script>
    <!-- -->
    <style type="text/css">
        .removedash:after, .removedash:before {
            padding-bottom: 0px;
        }
    </style>
    <div class="off-canvas-wrap" data-offcanvas="">
        <div class="inner-wrap" style="height: 671px;">

            {{--header--}}
            @include('main.header.layout')
            {{--header--}}


            <center>
                {{--Notifications--}}
                @if(session('notify'))
                    <br>
                    <div style="width: 1000px;" class="alert alert-{!! session('notify.class') !!} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{session('notify.message')}}</strong>
                    </div>
                @endif

                {{--content--}}
                @yield('content')
            </center>


            {{--footer--}}
            @include('main.footer')
            {{--footer--}}


            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>

<!-- Footer Scripts -->
@include('main.scripts')
@stack('scripts')
</body>

</html>
