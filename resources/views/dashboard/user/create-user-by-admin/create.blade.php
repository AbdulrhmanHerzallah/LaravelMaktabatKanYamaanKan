@extends('dashboard.index')



@section('content')
    <div class="container">
    <!-- Horizontal Form -->
    <div class="card card-success mt-5">
        <div class="card-header">
            <h4 class="">إنشاء موظف جديد</h4>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('user.store')}}" method="post">
            @csrf
            <div class="card-body">
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input value="{{old('email')}}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="emp-name">إسم الموظف</label>
                        <input value="{{old('name')}}" type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="emp-name">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">رقم الهاتف</label>
                        <input value="{{old('phone_number')}}" type="tel" name="phone_number" class="@error('phone_number') is-invalid @enderror form-control" id="phone_number">
                    </div>

                    <div class="form-group">
                        <label for="permission">الصلاحية</label>
                        <select name="permission" class="@error('permission') is-invalid @enderror form-control" id="permission">
{{--                            <option value="1">مدير عام</option>--}}
                            <option @if(old('permission') == 2) selected @endif value="2">مدير فرع</option>
                            <option @if(old('permission') == 3) selected @endif value="3">أمينة مكتبة</option>
                            <option @if(old('permission') == 4) selected @endif value="4">موظف إدارة مالية</option>
                            <option @if(old('permission') == 5) selected @endif value="5">مسؤول التواصل</option>
                            <option @if(old('permission') == 6) selected @endif value="6">موظف إدارة التسويق</option>
                            <option @if(old('permission') == 7) selected @endif value="7">مدير التسويق</option>
                            <option @if(old('permission') == 8) selected @endif value="8">متعاون/متدرب</option>
                            <option @if(old('permission') == 9) selected @endif value="9">متطوع</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gender">الجنس</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                            <option @if(old('gender') == 'm') selected @endif value="m">ذكر</option>
                            <option @if(old('gender') == 'f') selected @endif value="f">إنثي</option>
                        </select>
                    </div>

                <div class="form-group">
                    <label for="national_identity">رقم الهوية</label>
                    <input value="{{old('national_identity')}}" type="text" name="national_identity" class="form-control @error('national_identity') is-invalid @enderror" id="national_identity">
                </div>

                <div class="form-group">
                    <label for="social_insurance_number">رقم الضمان الاجتماعي</label>
                    <input type="text" value="{{old('social_insurance_number')}}" name="social_insurance_number" class="form-control @error('social_insurance_number') is-invalid @enderror" id="social_insurance_number">
                </div>

                <div class="form-group">
                    <label for="social_insurance_number">تاريخ الاشتراك في التأمين الاجتماعي</label>
                    <input type="date" value="{{old('data_subscribe_social')}}" name="data_subscribe_social" class="form-control @error('data_subscribe_social') is-invalid @enderror" id="social_insurance_number">
                </div>

                <div class="form-group">
                    <label for="social_insurance_number">تاريخ بداية العقد</label>
                    <input type="date" value="{{old('contract_starting_date')}}" name="contract_starting_date" class="form-control @error('contract_starting_date') is-invalid @enderror" id="social_insurance_number">

                </div>

                <div class="form-group">
                    <label for="social_insurance_number">تاريخ نهاية العقد</label>
                    <input type="date" value="{{old('contract_ending_date')}}" name="contract_ending_date" class="form-control @error('contract_ending_date') is-invalid @enderror" id="social_insurance_number">

                </div>

                <div class="form-group">
                    <label for="social_insurance_number">قيمة الراتب</label>
                    <input type="text" value="{{old('salary')}}" name="salary" class="form-control @error('salary') is-invalid @enderror" id="social_insurance_number">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">تسجيل مستخدم جديد</button>
                <button type="reset" class="btn btn-default float-right">تفريغ</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
    </div>
@endsection
