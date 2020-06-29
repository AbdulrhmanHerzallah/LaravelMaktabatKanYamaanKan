@extends('dashboard.index')

@section('content')

        <div class="container d-flex justify-content-center">

            <div class="card mt-4 col-8 ">
                <div class="card-body">
                    <h5  class="card-title">المرسل : {{$sender_name ?? ''}}</h5>
                    {{--                <h6 class="card-subtitle mb-2 text-muted">العنوان:/</h6>--}}
                    <h6 class="card-subtitle mb-2 text-muted">موضوع الطلب:/ {{$demand->title}}</h6>
                    <p class="card-text">{!! $demand->body !!}</p>
                    <span class="card-link text-info">{{$demand->created_at->diffForHumans()}}</span>
                    <span class="card-link text-info">
                      @switch($demand->status)
                            @case('h')
                            <span class="text-danger">مستعجل</span>
                            @break
                            @case('n')
                            <span class="text-info">غير مستعجل</span>
                            @break
                            @default
                            إالك الله
                        @endswitch
                </span>
                    {{--                <a href="#" class="card-link">Another link</a>--}}
                </div>
            </div>
        </div>
@endsection
