@extends('dashboard.index')

@section('content')
    <div class="container">

        <div class="content mt-2">
            {{ Breadcrumbs::render('inbox_d') }}
        </div>

        <form action="{{route('demand.getTypeMessages')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="cat">ترتيب الطلبات حسب التصنيف</label>
                <div class="form-group">
                    <select name="status" class="form-control col-6 d-inline-block" id="cat">
                        <option @if(old('status') == 'h') selected @endif value="h">مستعجل</option>
                        <option @if(old('status') == 'n') selected @endif value="n">غير مستعجل</option>
                    </select>
                    <button type="submit" class="btn btn-outline-primary mb-2" style="font-size: 12px"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>


    <a href="{{route('demand.show-inbox-demand')}}" class="btn btn-outline-primary mb-2" style="font-size: 12px">جميع الطلبات</a>


    @foreach($demands as $i)
        <div class="container d-flex justify-content-center">

            <div class="card mt-4 col-8 ">
                <div class="card-body">
                    <h5  class="card-title">المرسل :{{\App\Models\User::find($i->pivot->user_id)->name ?? ''}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">موضوع الطلب:/ {{$i->title}}</h6>
                    <p class="card-text">{!! $i->body !!}</p>
                    <span class="card-link text-info">{{$i->created_at->diffForHumans()}}</span>
                    <span class="card-link">
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
                    </span>
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
