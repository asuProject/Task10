

<li class="has-submenu"><a href="#" id="current"><span>{{__('conference Roles')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('conferenceRole.create')}}" id="current"> <span>{{__('Add conference Role')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('conferenceRole.index')}}" id="current"> <span>{{__('View conference\'s Roles')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

