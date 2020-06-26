@extends('dashboard.index')

@section('content')
    <div class="container mt-2">
        <div class="content mt-2 mb-4">
            {{ Breadcrumbs::render('upload_files') }}
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <form action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex justify-content-center border border-info p-5 mb-5">
                        <div class="col-lg-5">
                            <div>
                                <input type="file" class="d-none" id="file" name="file[]" multiple>
                                <label id="file_click" class="btn btn-outline-dark w-100 pt-1 pb-1" for="file">إرفاق
                                    ملفات</label>

                                <div class="d-flex justify-content-around">
                                    <label class="radio-inline">
                                        <input type="radio" name="power" value="1" checked>&nbsp;خاص
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="power" value="2" >&nbsp;عام
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">التصنيفات</label>
                                    <select name="cat" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($file_cat as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p id="total_files_select" style="font-weight: bold"></p>
                                <div id="success" class="alert alert-success d-none" role="alert"></div>


                                <div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mr-5">
                            <div class="progress">
                                <div id="progress"
                                     class="progress-bar-animated progress-bar progress-bar-striped bg-success font-weight-bold"
                                     role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                     aria-valuemax="0"></div>
                            </div>
                            <ol id="files_name" class="mt-3"></ol>

                            <button id="submit" type="submit" class="btn btn-primary mt-2 w-100 mb-5" disabled>رفع الملفات المرفقة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script>
        $(document).ready(function () {
            $('#file_click').click(function () {
                $('#file').change(function (e) {
                    $('.files').remove();
                    $('#progress').text(0 + '%').css('width' , 0+'%')

                    if(e.target.files.length == e.target.files.length)
                    {
                        $('#submit').removeAttr("disabled");
                    }

                    $('#total_files_select').html('عدد الملفات المرفقة: ' + e.target.files.length)
                    for (let i = 0 ; i < e.target.files.length ; i++ )
                    {

                        let data = '<li class="files">' + e.target.files[i].name +'</li>';
                        // console.log(e.target.files[i].name)
                        let html= $('#files_name').append(data)
                    }
                })

            })

        })
    </script>
    <script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
{{--    <script src="{{asset('jquery.form.min.js')}}"></script>--}}
    <script>
        $(document).ready(function () {
            $('form').ajaxForm({
                beforeSend:()=> {
                    console.log('hell')


                },
                uploadProgress:function (event,position , total, percentComplete) {
                    console.log(percentComplete)
                    $('#progress').text(percentComplete + '%').css('width' , percentComplete+'%')
                    if(percentComplete == 100)
                    {
                        $('#submit').prop( "disabled", true );
                    }


                    if(percentComplete == 100)
                    {
                        $('#progress').removeClass('progress-bar-animated')
                    }

                },
                success:function(data){
                    if (data.errors)
                    {
                        console.log(data.errors)
                    }
                    if (data.files_success)
                    {
                        console.log(data.files_success.length)
                        $('#success').html(' تم رفع ' + data.files_success.length + ' ملفات بنجاح ')
                        $('#success').removeClass('d-none')

                    }
                }
            })
        })
    </script>
@endsection
