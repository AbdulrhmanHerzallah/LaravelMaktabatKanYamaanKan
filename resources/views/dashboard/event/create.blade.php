@extends('dashboard.index')



@section('content')
<div class="container">
        <!-- /.card -->
        <!-- Horizontal Form -->
    <div class="content mt-2">
        {{ Breadcrumbs::render('create_event') }}
    </div>


        <div class="card card-info mt-3">
            <div class="card-header">
                <h3 style="font-size: 15px">إضافة مهمة</h3>
            </div>

            <form action="{{route('event.store')}}" method="post" class="card-body" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="title">إسم المشروع</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="العنوان" value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="note">معلومات عن المشروع</label>
                        <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="note" placeholder="الوصف" spellcheck="false">{{old('body')}}</textarea>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">البداية</span>
                        </div>
                        <input type="date" name="start" value="{{old('start')}}" class="form-control @error('start') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <span>&nbsp;&nbsp;&nbsp;</span>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">النهاية</span>
                        </div>
                        <input name="end" type="date" value="{{old('end')}}" class="form-control @error('end') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="form-group">
                        <label for="leader">قائد المشروع</label>
                        <select name="leader_id" class="form-control @error('leader_id') is-invalid @enderror" id="leader">
                            <option value="" selected>حدد القائد</option>
                        @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="emp">الفريق</label>
                        <select multiple name="team[]" class="form-control @error('team') is-invalid @enderror" id="emp">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="color">اللون</label>
                        <input type="color" name="color" value="{{old('color')}}" class="form-control col-1" id="color" placeholder="color">
                    </div>

                    <div class="form-group">
                        <label for="insert_file">أرفق ملف أو صورة</label>
                        <input value="{{old('file')}}" name="file" type="file" class="form-control-file" id="insert_file">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <button type="reset" class="btn btn-secondary float-right">Cancel</button>
                    </div>

                </div>
            </form>

        </div>
        <!-- /.card -->

@endsection
