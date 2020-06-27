@extends('dashboard.index')



@section('content')
    <div class="container">
        <div class="container mt-3">
            <div class="content mt-2 mb-4">
                {{ Breadcrumbs::render('account_settings') }}
            </div>
        </div>
        <!-- Horizontal Form -->
        <div class="card card-info mt-2">
            <div class="card-header">
                <h5 class="">تعديل إعدادات الحساب</h5>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('user.update_user_account')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input value="{{old('email' , $user->email)}}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">كلمة المرور الحالية</label>
                        <input value="{{old('main_password')}}" type="password" name="main_password" class="@error('main_password') is-invalid @enderror form-control" id="main_password">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">كلمة المرور الجديدة</label>
                        <input value="{{old('password')}}" type="password" name="password" class="@error('password') is-invalid @enderror form-control" id="new_password">
                    </div>


                    <div class="form-group">
                        <label for="phone_number">تأكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror form-control" id="password_confirmation">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">تحديدث البينات</button>
                    <button type="reset" class="btn btn-default float-right">تفريغ</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
