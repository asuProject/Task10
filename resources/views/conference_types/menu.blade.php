

<li class="has-submenu"><a href="#" id="current"><span>{{__('conference Types')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('conferenceType.create')}}" id="current"> <span>{{__('Add conference Type')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('conferenceType.index')}}" id="current"> <span>{{__('View conference\'s Types')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

