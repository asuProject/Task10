
{{--nav bar--}}
<nav class="tab-bar">
    <section class="left-small"><a class="left-off-canvas-toggle menu-icon" aria-expanded="false"><span
                    class="removedash"></span></a>
    </section>
    <section class="right tab-bar-section">
        <center>
            <div id="top_menu">
                <ul class="top_menu">
                    <li><a href="http://asu.asugards.edu.eg/credit_hours">{{__('Home')}}</a></li>
                    <li><a target="_self" href="http://asu.asugards.edu.eg/aboutus">{{__('About')}}</a></li>
                    <li><a target="_self" href="http://asu.asugards.edu.eg/profile">{{__('Staff')}}</a></li>
                    <li><a target="_self" href="http://asu.asugards.edu.eg/CHEPContact">{{__('Contact Us')}}</a></li>
                    <li class="right" style="padding: 3px 0px 0px 0px; text-align: center; height: 25px;" id="welcomename">
	                    <span style="font-style: oblique;">&nbsp;{{__('Welcome')}}! &nbsp;
                            <span>
                                <span style="font-family: PT Sans, sans-serif; color: white;font-size: 12px; height: 12px; font-style: normal;">@if (Auth::check()){{ Auth::user()->name }} @else  @endif</span>
                                <br>
                                <span style="font-family: PT Sans, sans-serif; color: #f0f0f0;font-size: 10px; height: 10px; font-style: normal;">{{__('LAST LOGIN')}}:
                                    @if (Auth::check()){{ Auth::user()->updated_at }} @else  @endif
                                    <span></span>
                                </span>
                            </span>
                        </span>
                    </li>
                    {{--<li class="right dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--{{ App::getLocale()=='ar'? __('Arabic') : __('English') }}--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="{{ route('lang.switch', 'ar') }}">{{__('Arabic')}} @if(App::getLocale()=='ar')<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>@endif </a></li>--}}
                            {{--<li><a href="{{ route('lang.switch', 'en') }}">{{__('English')}} @if(App::getLocale()=='en')<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>@endif</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li id="langherf" style="float: right;">
                    @if(App::getLocale()=='ar')
                        <a href="{{ route('lang.switch', 'en') }}" style="color: white; margin-left: 20px; float: left">En</a>
                    @else
                        <a href="{{ route('lang.switch', 'ar') }}" style="color: white; margin-right: 20px;">عربي</a>
                    @endif
                    </li>
                </ul>
            </div>
        </center>
    </section>
</nav>
{{--end nav bar--}}