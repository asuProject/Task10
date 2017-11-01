
{{--logo photos--}}
<div id="logo"><img src="{{asset('images/logo.png')}}" style="padding: 10px 20px 0 0; float: right; height: 125px; width: auto;">
    <img src="{{ asset('images/university_building.png') }}"
         style="float: left; height: 125px">
    <div style="clear: both"></div>
</div>
{{--end logo photos--}}

{{--menu--}}
<div id="menu2" style="">
    <ul class="menu2">
        <li><a target="_self" href="http://asu.asugards.edu.eg/">{{ __('Education') }}</a>
            <ul>
                <li><a target="_self" href="http://asu.asugards.edu.eg/undergraduateProgram">{{ __('Undergraduate Programs') }}</a></li>
                <li><a target="_self" href="http://asu.asugards.edu.eg/postgraduateProgram">{{ __('Postgraduate Programs') }}</a></li>
                <li><a target="_self" href="http://asu.asugards.edu.eg/credit_hours">{{ __('Credit Hours Program') }}</a></li>
            </ul>
        </li>
        <li><a target="_self" href="http://asu.asugards.edu.eg/research">{{ __('Research') }}</a>
        </li>
        <li><a target="_self" href="http://asu.asugards.edu.eg/consultancy">{{ __('Consultancy') }}</a>
        </li>
        <li><a target="_self"
               href="http://asu.asugards.edu.eg/collegeDepartments">{{ __('Departments') }}</a>
        </li>
        <li><a target="_self" href="http://asu.asugards.edu.eg/educationQuality">{{ __('Quality') }}</a>
        </li>
        <li><a target="_self" href="http://asu.asugards.edu.eg/studentActivities">{{ __('Student Activities') }}</a></li>
        <li><a target="_self" href="http://asu.asugards.edu.eg/news">{{ __('News') }}</a>
        </li>
        <li><a target="_self" href="http://asu.asugards.edu.eg/">{{ __('ASU Journal') }}</a></li>
    </ul>
</div>
{{--end menu--}}