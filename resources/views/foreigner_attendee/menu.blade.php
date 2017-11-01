

<li class="has-submenu"><a href="#" id="current"><span>{{__('Foreigners')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('foreignerAttendee.create')}}" id="current"> <span>{{__('Add Foreigner')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('foreignerAttendee.index')}}" id="current"> <span>{{__('View Foreigners')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

