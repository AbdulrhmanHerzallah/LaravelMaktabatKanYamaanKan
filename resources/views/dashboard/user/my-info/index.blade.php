@extends('dashboard.index')


@section('content')


    <div class="container">

        <div class="container mt-3">
            <div class="content mt-2 mb-4">
                {{ Breadcrumbs::render('my-info') }}
            </div>

            <div class="card text-white bg-dark mb-3 mt-3">
            <div class="card-header">معلوماتي</div>
            <div class="card-body">
{{--                <h5 class="card-title">{{$user->name}}</h5>--}}

                <div class="alert alert-warning" role="alert">
                    <p class="card-text">ملاحظة إذا هناك خلل في البينات المرفقة أرجو من منك ارسال طلب للمدير العام لتعديل البينات وشكراََ لك.</p>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">إسمي الشخصي</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->email}}</h5>
                <p class="card-text">البريد الالكتروني</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->phone_number}}</h5>
                <p class="card-text">رقم الهاتف</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->contract_starting_date}}</h5>
                <p class="card-text">تاريخ بدأ العقد</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->contract_ending_date}}</h5>
                <p class="card-text">تاريخ نهاية العقد</p>
            </div>  <div class="card-body">
                <h5 class="card-title">
                    @switch($user->permission)
                        @case(1)
                        مدير عام
                        @break
                        @case(2)
                        مدير فرع
                        @break
                        @case(3)
                        أمينة مكتبة
                        @break
                        @case(4)
                        موظف إدارة مالية
                        @break
                        @case(5)
                        مسؤول التواصل
                        @break
                        @case(6)
                        موظف إدارة التسويق
                        @break
                        @case(7)
                        مدير التسويق
                        @break
                        @case(8)
                        متعاون/متدرب
                        @break
                        @case(9)
                        متطوع
                        @break
                        @default
                    @endswitch
                </h5>
                <p class="card-text">المسمي الوظيفي</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->national_identity}}</h5>
                <p class="card-text">رقم الهاوية</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->social_insurance_number}}</h5>
                <p class="card-text">رقم التأمين الاجتماعي</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->data_subscribe_social}}</h5>
                <p class="card-text">تاريخ الاشتراك في التأمين الاجتماعي</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$user->number_of_vacations}}</h5>
                <p class="card-text">عدد الايجازات المتبقية</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    @switch($user->gender)
                        @case('m')
                        ذكر
                        @break
                        @case('f')
                        انثي
                        @break
                        @default
                    @endswitch
                </h5>
                <p class="card-text">الجنس</p>
            </div>
        </div>


@endsection
