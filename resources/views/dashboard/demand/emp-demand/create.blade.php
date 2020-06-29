@extends('dashboard.index')

@section('content')




    <div class="container">

        <div class="content mt-2">
            {{ Breadcrumbs::render('create_demand') }}
        </div>
        @if($errors->any())
            {{--        @foreach ($errors->all() as $error)--}}
            {{--            <div>{{ $error }}</div>--}}
            <div class="alert alert-danger" role="alert">
                يوجد خطأ في المدخلات!
            </div>

            {{--        @endforeach--}}
        @endif
        <div class="card card-success">
            <div class="card-header">
                <h6 class="">إنشاء طلب</h6>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <div class="card-body">
                    <div class="row d-flex justify-content-center mt-4 mb-3">
                        <div class="col-9">



                            <form action="{{route('demand.store')}}" method="post">

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
                                    <textarea id="compose-textarea"  style="height: 900px;z-index: 90" class="form-control @error('body') is-invalid @enderror" id="body" name="body">{{old('body')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="em_name">قم بتحديد الموظفين</label>
                                    <select multiple class="form-control @error('emp_name') is-invalid @enderror" id="em_name" name="emp_name[]">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"  @if(old('status') == 'h') checked="checked" @endif name="status" id="inlineRadio1" value="h">
                                        <label class="form-check-label @error('status') text-danger @enderror" for="inlineRadio1">مستعجل</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"  @if(old('status') == 'n') checked="checked" @endif name="status" id="inlineRadio2" value="n">
                                        <label class="form-check-label @error('status') text-danger @enderror" for="inlineRadio2">غير مستعجل</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">إرسال</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-ar-AR.min.js" integrity="sha256-rH047tiLgw9l5v/KBXIwdarKNUl8qNA//GpULoiys8E=" crossorigin="anonymous"></script>
    <script>
        $(function () {
            //Add text editor
            $('#compose-textarea').summernote({
                lang : "ar-AR",
                height: 300,
            })
        })
    </script>
@endsection
