@extends('dashboard.index')

@section('content')

    <div class="container">

        <div class="content mt-2">
            {{ Breadcrumbs::render('create_demand') }}
        </div>

        <div class="row d-flex justify-content-center mt-4 mb-3">
            <div class="col-9">
                <form action="{{route('demand.store_admin')}}" method="post">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="title">عنوان الطلب</label>
                        <input class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" id="title" placeholder="العنوان">
                    </div>

                    <div class="form-group">
                        <label for="body">تفاصيل الطلب</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body">{{old('body')}}</textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" @if(old('status') == 'h') checked="checked" @endif type="radio" name="status" id="inlineRadio1" value="h">
                            <label class="form-check-label @error('status') text-danger @enderror" for="inlineRadio1">مستعجل</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" @if(old('status') == 'n') checked="checked" @endif name="status" id="inlineRadio2" value="n">
                            <label class="form-check-label @error('status') text-danger @enderror" for="inlineRadio2">غير مستعجل</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </form>
            </div>
        </div>
    </div>

@endsection
