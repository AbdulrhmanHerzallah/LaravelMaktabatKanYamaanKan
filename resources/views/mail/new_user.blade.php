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
    <div style="margin: 20px">مرحباََ {{$data->name}}</div>
    <div style="text-align: right;padding: 10px;padding-bottom: 30px;margin-left: 60px;font-size: 15px">
        يسعدنا انضمامك لفريق كان ياما كان، هذه الرسالة تحتوي على كلمة المرور الخاصة بك.. أرجوا منك المحافظة عليها وعدم مشاركتها مع أحد.
        <div><span style="font-weight: bold">كلمة المرور :
                <p>{{$password}}</p>
                </span></div>
{{--        <div>لتأكيد تسجيلك في منصة العمل، نرجو منك الضغط على الرابط التالي</div>--}}
{{--        <div><a href="{{route('user.index' , ['id' => $data->id])}}">تأكيد البينات</a></div>--}}
        <p style="font-weight: bold">شكراََ لك</p>
        <p style="font-weight: bold">عبدالرحمن القاضي</p>

    </div>
</div>


</body>
</html>


