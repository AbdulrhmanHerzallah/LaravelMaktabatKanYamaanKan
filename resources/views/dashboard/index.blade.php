<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-head-component/>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <x-nav-component/>
    <x-sidebar-component/>
    <div class="content-wrapper">
{{--        <x-breadcrumb-component/>--}}
        @if(Request::is('dashboard'))
        {{ Breadcrumbs::render('dashboard') }}
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if(Request::is('dashboard'))
                        <x-informations-component/>
                    @endif
                </div>
                <div class="row">
{{--                   @foreach($segments = request()->segments() as $index => $s)--}}
{{--                        {{$s}}--}}
{{--                   @endforeach--}}
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
    <x-footer-component/>
</div>
<x-script-component/>
</body>
</html>
