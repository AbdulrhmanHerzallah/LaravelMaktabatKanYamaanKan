<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            height: 100vh;
            /*background-color: #ecf0f1 !important;*/
        }
        .container{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50% , -50%);
            /*background-color: #16a085;*/
            width: 100%;
            text-align: right;
            padding: 10px;
            box-shadow: 5px 10px 100px 10px #888888
        }

    </style>
</head>
<body>

<div class="container" style="color: black">
    <br>
    <br>
    <br>
    <br>
    <p style="font-weight: bold;margin-right: 50px;font-size: 20px">عنوان الطلب : <span style="font-weight: normal;text-decoration: underline">{{$data['demand']['title']}}</span></p>
    <p style="font-weight: bold;margin-right: 50px;font-size: 20px">الاهمية : <span style="font-weight: normal;text-decoration: underline">
            @switch($data['demand']['status'])
            @case('h')
                مستعجل
                @break
                @case('n')
                غير مستعجل
                @break
                @default
                ربنا كبير
            @endswitch
        </span>
    </p>
    <br>
    <br>
    <div style="text-align: right;padding: 10px;padding-bottom: 30px;margin-left: 60px;font-size: 15px">{!!$data['demand']['body']!!}</div>
</div>


<div style="font-weight: bold">مرسل الطلب:{{$data['user_name']}}</div>
<div style="font-weight: bold">تاريخ الطلب:{{\Carbon\Carbon::now()->format('Y-m-d')}}</div>
<div style="font-weight: bold">عنوان الموقع الالكتروني:{{url('/')}}</div>

</body>
</html>
