@extends('dashboard.index')

@section('content')
    <div class="container">

        <div class="content mt-2">
            {{ Breadcrumbs::render('my_demand') }}
        </div>
    </div>
        @foreach($demands as $i)
            <div class="container d-flex justify-content-center">

            <div class="card mt-4 col-8 ">
            <div class="card-body">
                <h5  class="card-title">المرسل أنا</h5>
{{--                <h6 class="card-subtitle mb-2 text-muted">العنوان:/</h6>--}}
                <h6 class="card-subtitle mb-2 text-muted">موضوع الطلب:/ {{$i->title}}</h6>
                <p class="card-text">{!! $i->body !!}</p>
                <span class="card-link text-info">{{$i->created_at->diffForHumans()}}</span>
                <span class="card-link text-info">
                      @switch($i->status)
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
    @endforeach
<div class="container">
    <div class="d-flex justify-content-center">
        {!! $demands->links() !!}
    </div>
</div>



@endsection
