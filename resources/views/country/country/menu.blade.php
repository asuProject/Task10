

<li class="has-submenu"><a href="#" id="current"><span>{{__('countries')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('country.country.create')}}" id="current"> <span>{{__('Add country')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('country.country.index')}}" id="current"> <span>{{__('View countries')}}</span></a></li>
        {{--@endcan--}}

        {{--city types--}}
        @include('country.town.menu')
        {{---------}}

    </ul>
</li>

