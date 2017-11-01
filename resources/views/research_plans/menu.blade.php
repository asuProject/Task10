

<li class="has-submenu"><a href="#" id="current"><span>{{__('plans')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('researchPlans.create')}}" id="current"> <span>{{__('Add plan')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('researchPlans.index')}}" id="current"> <span>{{__('View plans')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

