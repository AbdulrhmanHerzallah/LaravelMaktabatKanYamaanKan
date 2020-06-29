<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link bg-info rounded">{{auth()->user()['name']}}</span>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">الرئيسية</a>
        </li>


{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="#" class="nav-link">Contact</a>--}}
{{--        </li>--}}
    </ul>

    <!-- SEARCH FORM -->
{{--    <form class="form-inline ml-3">--}}
{{--        <div class="input-group input-group-sm">--}}
{{--            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-navbar" type="submit">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{auth()->user()->unreadNotifications->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{auth()->user()->unreadNotifications->count()}} اشعار</span>
                <div class="dropdown-divider"></div>
                @foreach(auth()->user()->unreadNotifications as $nty)
                <a href="{{route('demand.show-single-demand' , ['id_not' => $nty->id  , 'id_d' => $nty->data['demand_id']  ])}}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{$nty->data['title']}}
                    <span class="float-right text-muted text-sm">{{$nty->created_at->diffForHumans()}}</span>
                    <span>&nbsp;
                </span>
                    <p class="text-muted text-sm">المرسل {{$nty->data['sender_name']}}</p>
                </a>
                @endforeach

{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                    <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                    <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/logout')}}" title="تسجيل الخروج">
                <i class="fas fa-door-open"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
