

{{--nav bar--}}
@include('main.header.navbar')
{{--end nav bar--}}

{{--dashboard menu--}}
@include('main.header.menu')
{{--end dashboard menu--}}

<center>

    <div id="header">
        <center>
            <div style="width: 1000px; background: #fff; box-shadow: -1px 0px 29px 3px rgba(0, 0, 0, 0.29); padding-bottom: 5px;"
                 class="header2">

                {{--logo photos and second menu--}}
                @include('main.header.logomenu')
                {{--end logo photos--}}

                <br>

                {{-- privileges --}}
                {{-- we don't need privilege  --}}
                {{--@include('main.header.privileges')--}}
                {{-- end privileges--}}

                <br>

                <div style="clear: both;"></div>

            </div>
        </center>
    </div>

</center>