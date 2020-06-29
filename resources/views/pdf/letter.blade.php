<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style>
    body{
        font-size: 11px;
    }
    table {
        /*font-family: arial, sans-serif;*/
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .th-info ,.td-info{
        text-align: center;
        background-color: white;
        border: none;
    }
</style>
<body>

{{--<p style="float: left">عبود</p>--}}
{{--<p style="display: flex;justify-content: center">عبود</p>--}}


<div>
    <div style="float: right; width: 40%;">

        <img src="{{storage_path('/logo/logo.png')}}" width="170">

    </div>

    <div style="float: left; width: 35%;margin-top: 30pt">
        <br><br><br>
        <div>
            <div style="margin-top: 10px">
                <span style="font-weight: bold">{{__('pdf.address')}}</span>  طريق أبو بكر الصديق - حي الربيع
                الرياض، المملكة العربية السعودية
            </div>
            <div style="margin-top: 10px">
                <span style="font-weight: bold">{{__('pdf.phone_contact')}}</span>966554063391+
            </div>
            <div style="margin-top: 10px">
                <span style="font-weight: bold">{{__('pdf.site')}}</span><a href="https://www.kykbs.com/" style="text-decoration: none;color: black">https://www.kykbs.com</a>
            </div>
        </div>
    </div>

    <div style="clear: both; margin: 0pt; padding: 0pt; "></div>

</div>

<br><br><br>

    <div style="overflow: auto;text-align: justify;font-size: 20px">
        <div style="line-height: 40px;">
            {!! $data['body'] ?? 'f'!!}
        </div>
    </div>

<br>
<br>
<br>







<div>
    <div style="float: left;width: 30%">
        <span style="font-weight: bold">التاريخ :  </span>{{$data['hijri'] ?? 'f'}}
        <br>
        <br>
        <br>
{{--        <p><span style="font-weight: bold">إسم المسؤول :</span> {{auth()->user()['name']}}  </p>--}}
{{--        <p><span style="font-weight: bold">الوظيفة :</span>--}}
{{--            @switch(auth()->user()['permission'])--}}
{{--                @case(1)--}}
{{--                مدير عام--}}
{{--                @break--}}
{{--                @case(2)--}}
{{--                مدير فرع--}}
{{--                @break--}}
{{--                @case(3)--}}
{{--                أمينة مكتبة--}}
{{--                @break--}}
{{--                @case(4)--}}
{{--                موظف إدارة مالية--}}
{{--                @break--}}
{{--                @case(5)--}}
{{--                مسؤول التواصل--}}
{{--                @break--}}
{{--                @case(6)--}}
{{--                موظف إدارة التسويق--}}
{{--                @break--}}
{{--                @case(7)--}}
{{--                مدير التسويق--}}
{{--                @break--}}
{{--                @case(8)--}}
{{--                متعاون/متدرب--}}
{{--                @break--}}
{{--                @case(9)--}}
{{--                متطوع--}}
{{--                @break--}}
{{--                @default--}}
{{--            @endswitch--}}
{{--        </p>--}}
        <img src="{{storage_path('sine/sine.png')}}" width="100">
    </div>

</div>


</body>
</html>
