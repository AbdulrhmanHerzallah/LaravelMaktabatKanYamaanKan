@extends('dashboard.index')

{{--@section('head')--}}
{{--    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>--}}
{{--    <link href='/fullcalendar/packages/core/main.css' rel='stylesheet' />--}}
{{--    <link href='/fullcalendar/packages/bootstrap/main.css' rel='stylesheet' />--}}
{{--    <link href='/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />--}}
{{--    <link href='/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />--}}
{{--    <link href='/fullcalendar/packages/list/main.css' rel='stylesheet' />--}}
{{--    <script src='/fullcalendar/packages/core/main.js'></script>--}}
{{--    <script src='/fullcalendar/packages/interaction/main.js'></script>--}}
{{--    <script src='/fullcalendar/packages/bootstrap/main.js'></script>--}}
{{--    <script src='/fullcalendar/packages/daygrid/main.js'></script>--}}
{{--    <script src='/fullcalendar/packages/timegrid/main.js'></script>--}}
{{--    <script src='/fullcalendar/packages/list/main.js'></script>--}}
{{--    <script src='/fullcalendar/packages/core/locales-all.js'></script>--}}

{{--@endsection--}}

@section('style')
    <style>
        /*button{*/
        /*    margin: 5px;*/
        /*}*/

        td , th {
            text-align: center;
        }

    </style>
@endsection

@section('content')

<div class="container mt-5">
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">العنوان</th>
            <th scope="col">بداية المشروع</th>
            <th scope="col">نهاية المشروع</th>
            <th scope="col">الحالة</th>
            <th scope="col">منشئ المشروع</th>
            <th scope="col">قائد المشروع</th>
            <th scope="col">منذ</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $i)
        <tr>
            <td>{{$i->title}}</td>
            <td>{{$i->start}}</td>
            <td>{{$i->end}}</td>
            <td>
                @switch($i->state)
                    @case('c')
                    <span class="text-success">مكتمل</span>
                    @break
                    @case('u')
                    <span class="text-danger">غير مكتمل</span>
                    @break
                    @default
                    <span class="text-danger">غير مكتمل</span>
                @endswitch
            </td>
            <td>{{\App\Models\User::find($i->user_id)->name ?? ''}}</td>
            <td>{{\App\Models\User::find($i->leader_id)->name ?? ''}}</td>
            <td>{{$i->created_at->diffForHumans()}}</td>
            <td>
                <form action="{{route('show_event.show' , ['id' => $i->id])}}" method="get">
                    <button type="submit" class="btn btn-outline-light text-left"><i class="far fa-eye"></i></button>
                </form>
            <td><button class="btn btn-outline-light text-left"><i class="far fa-edit"></i></button></td>
        </tr>
        @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $events->links() !!}
    </div>

</div>















{{--    <div class="container mt-5">--}}
{{--        <div class="row d-flex justify-content-center">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div id='calendar' class="fc fc-ltr fc-bootstrap" style="background-color: #35485a;padding: 30px;color: #ecf0f1;border-radius: 10px"></div>--}}
{{--                <br><br>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection



{{--@section('script')--}}

{{--<script>--}}
    {{--document.addEventListener('DOMContentLoaded', function() {--}}
    {{--    var initialLocaleCode = 'ar';--}}
    {{--    var calendarEl = document.getElementById('calendar');--}}
    {{--    var calendar = new FullCalendar.Calendar(calendarEl, {--}}
    {{--        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],--}}
    {{--        dir : "ltr",--}}
    {{--        defaultDate: '{{$default->start ?? ''}}',--}}
    {{--        editable: false,--}}
    {{--        locale: initialLocaleCode,--}}
    {{--        buttonIcons: true, // show the prev/next text--}}
    {{--        weekNumbers: true,--}}
    {{--        navLinks: true, // can click day/week names to navigate views--}}
    {{--        themeSystem : 'bootstrap',--}}
    {{--        // editable: true,--}}
    {{--        eventLimit: true, // allow "more" link when too many events--}}
    {{--        events: [--}}
    {{--            @foreach($event as $item)--}}
    {{--            {--}}
    {{--              title : '{{$item->title}}',--}}
    {{--              start : '{{$item->start}}',--}}
    {{--              end   : '{{$item->end}}',--}}
    {{--              color : '{{$item->color}}',--}}
    {{--              url   :  '{{route('my_events.show' , ['id' => $item->id])}}'--}}
    {{--            },--}}
    {{--            @endforeach--}}
    {{--        ]--}}
    {{--    });--}}
    {{--    calendar.render();--}}
    {{--});--}}

{{--// </script>--}}



{{--@endsection--}}
