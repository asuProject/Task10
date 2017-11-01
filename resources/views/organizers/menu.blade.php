

<li class="has-submenu"><a href="#" id="current"><span>{{__('organizers')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('organizers.create')}}" id="current"> <span>{{__('Add organizer')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('organizers.index')}}" id="current"> <span>{{__('View organizers')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

