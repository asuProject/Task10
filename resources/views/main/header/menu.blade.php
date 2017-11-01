
<aside class="left-off-canvas-menu" style="height: 671px;">
    <ul class="off-canvas-list">
        <li><label style="text-align: center;"><strong>{{__('DashBoard Menu')}}</strong></label></li>

        {{--Here You can include all menus by your order--}}
        {{------------------------------------------------}}
        @role('admin')
        {{--conference types--}}
        @include('conference_types.menu')
        {{---------}}
        {{--Organizer--}}
        @include('organizers.menu')
        {{---------}}
        {{--Conference Roles--}}
        @include('conference_roles.menu')
        {{---------}}
        {{--attendance types--}}
        @include('attendance_types.menu')
        {{---------}}
        {{--deparmtents types--}}
        @include('departments.menu')
        {{---------}}
        {{--research plans types--}}
        @include('research_plans.menu')
        {{---------}}
        {{--foreigner attendee types--}}
        @include('foreigner_attendee.menu')
        {{---------}}
        {{--country & city types--}}
        @include('country.country.menu')
        {{---------}}
        {{--country & city types--}}
        @include('sponsor.menu')
        {{---------}}
        @endrole
        {{-------------------------------------------------}}
        {{--Logout--}}
        <li class="last"><a href="{{route('logout')}}"><span>{{__('Log Out')}}</span></a>
        </li>

    </ul>
</aside>