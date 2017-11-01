

<li class="has-submenu"><a href="#" id="current"><span>{{__('attendance Types')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('attendanceType.create')}}" id="current"> <span>{{__('Add attendance Type')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('attendanceType.index')}}" id="current"> <span>{{__('View attendance\'s Types')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

