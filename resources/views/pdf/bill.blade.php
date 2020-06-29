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
<div>
<div style="text-align: center;font-size: 15px">
    {{$data['bill_type']}}
</div>
</div>

<br><br><br>
<table style="margin-bottom: 10px">
    <tr>
        <th class="th-info">{{__('pdf.clint_name')}}<span style="font-weight: normal">{{$data['clint_name']}}</span></th>
        <th class="th-info">{{__('pdf.clint_phone_number')}}<span style="font-weight: normal">{{$data['clint_phone']}}</span></th>
        <th class="th-info">{{__('pdf.clint_address')}}<span style="font-weight: normal">{{$data['clint_address']}}</span></th>
    </tr>
</table>
<table>
    <caption><span style="font-weight: bold;margin-bottom: 10px">{{__('pdf.bill_number')}}</span>{{$data['bill_number']}}</caption>
    <tr>
        <th>{{__('pdf.product_name')}}</th>
        <th>{{__('pdf.price')}}</th>
        <th>{{__('pdf.quantity')}}</th>
        <th>{{__('pdf.discount')}}</th>
        <th>{{__('pdf.total_price')}}</th>
        <th>{{__('pdf.note')}}</th>
    </tr>

    @foreach($data['data'] as $i)
    <tr>
        <td>{{$i->name}}</td>
        <td>{{$i->price}}</td>
        <td>{{$i->quantity}}</td>
        <td>{{$i->dis_account.'%'}}</td>
        <td>
            {{( $i->price -  ($i->price * ($i->dis_account / 100))) * $i->quantity }}
        </td>
        <td>{{$i->note}}</td>
    </tr>
    @endforeach


    <tr>
        <th>{{__('pdf.tax')}}</th>
        <td>({{$data['tax']}}%) {{$data['total_tax_expend']}} ريال</td>
    </tr>
    <tr>
        <th style="background-color: white">{{__('pdf.total_price_without_tax')}}</th>
        <td style="background-color: white">{{$data['total_prices']}} ريال فقط</td>
    </tr>
    <tr>
        <th style="background-color: white">{{__('pdf.total_price_with_tax')}}</th>
        <td style="background-color: #dddddd">{{$data['total_tax']}} ريال فقظ</td>
    </tr>

  <tr>
</table>

<div>

{{--    <div style="float: right; width: 28%;">--}}
{{--        This is text that is set to float:right.--}}
{{--    </div>--}}

<div>
    <br><br>
    <div style="float: right;width: 40%">
{{--        <div><span style="font-weight: bold">إسم المكلف:</span> مؤسسسة كان ياما كان للتجارة.</div>--}}
        <div><span style="font-weight: bold">رقم التسجيل الضريبي:</span> {{__('layout.tax_number_company')}}</div>
    </div>
    <div style="float: left; width: 30%;">
        <div>
            <p><span style="font-weight: bold">{{__('pdf.date')}}</span>{{$data['date']}}</p>
            <p><span style="font-weight: bold">مصدر الفاتورة:</span> {{auth()->user()['name']}} </p>
{{--            <p><span style="font-weight: bold">{{__('pdf.name_of_the_billing_author')}}</span>{{auth()->user()['name']}}</p>--}}
{{--            <p><span style="font-weight: bold">{{__('pdf.job')}}</span>--}}

{{--                @switch(auth()->user()['permission'])--}}
{{--                    @case(1)--}}
{{--                    مدير عام--}}
{{--                    @break--}}
{{--                    @case(2)--}}
{{--                    مدير فرع--}}
{{--                    @break--}}
{{--                    @case(3)--}}
{{--                    أمينة مكتبة--}}
{{--                    @break--}}
{{--                    @case(4)--}}
{{--                    موظف إدارة مالية--}}
{{--                    @break--}}
{{--                    @case(5)--}}
{{--                    مسؤول التواصل--}}
{{--                    @break--}}
{{--                    @case(6)--}}
{{--                    موظف إدارة التسويق--}}
{{--                    @break--}}
{{--                    @case(7)--}}
{{--                    مدير التسويق--}}
{{--                    @break--}}
{{--                    @case(8)--}}
{{--                    متعاون/متدرب--}}
{{--                    @break--}}
{{--                    @case(9)--}}
{{--                    متطوع--}}
{{--                    @break--}}
{{--                    @default--}}
{{--                @endswitch--}}
{{--            </p>--}}
        </div>
        <div style="float: right;width: 80px">
            <img src="{{storage_path('sine/sine.png')}}" width="100">
        </div>
    </div>

    <div style="clear: both; margin: 0pt; padding: 0pt; "></div>
</div>
</div>



</body>
</html>
