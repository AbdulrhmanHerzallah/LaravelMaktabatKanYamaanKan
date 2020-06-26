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
        font-size: 12px;
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

        <img src="{{public_path('/logo/logo.png')}}" width="170">

    </div>

    <div style="float: left; width: 35%;margin-top: 30pt">
        <br><br><br>
        <div>
            <div style="margin-top: 10px">
                <span style="font-weight: bold">{{__('pdf.address')}}</span>  Gaza Strip
            </div>
            <div style="margin-top: 10px">
                <span style="font-weight: bold">{{__('pdf.phone_contact')}}</span>00972598304517
            </div>
            <div style="margin-top: 10px">
                <span style="font-weight: bold">{{__('pdf.site')}}</span>{{asset('')}}
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






<div style="float: left;">
    <span style="font-weight: bold">التاريخ :  </span>{{$data['hijri'] ?? 'f'}}
    <p><span style="font-weight: bold">إسم المسؤول :</span> Sniper Herzallah </p>
    <p><span style="font-weight: bold">الوظيفة :</span>  مدير مكتب</p>
</div>
<div style="float: left;margin-left: 30px;margin-top: 10px">
    <img src="{{public_path('sine/sine.png')}}" width="100">
</div>

</body>
</html>
