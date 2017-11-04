

<li class="has-submenu"><a href="#" id="current"><span>{{__('conferences')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('conference.create')}}" id="current"> <span>{{__('Add conference')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('conference.index')}}" id="current"> <span>{{__('View conferences')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

