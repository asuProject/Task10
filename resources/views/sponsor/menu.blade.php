

<li class="has-submenu"><a href="#" id="current"><span>{{__('sponsors')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('sponsor.create')}}" id="current"> <span>{{__('Add sponsor')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('sponsor.index')}}" id="current"> <span>{{__('View sponsors')}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

