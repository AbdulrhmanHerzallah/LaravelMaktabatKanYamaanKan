@extends('dashboard.index')

@section('style')
    <style>
        td , th{
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">

        <div class="content mt-2">
            {{ Breadcrumbs::render('all_bills_admin') }}
        </div>

        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">إسم العميل</th>
                <th scope="col">رقم هاتف العميل</th>
                <th scope="col">عنوان العميل</th>
                <th scope="col">قيمة الضريبة</th>
                <th scope="col">نوع الفاتورة</th>
                <th scope="col">منشئ الفاتورة</th>
                <th scope="col">تاريخ إنشاء الفاتورة</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $i)
                <tr>
                    <th>{{$i->clint_name}}</th>
                    <td>{{$i->clint_phone}}</td>
                    <td>{{$i->clint_address}}</td>
                    <td>{{$i->tax.'%'}}</td>
                    <td>{{$i->bill_type}}</td>
                    <td>{{App\Models\User::find($i->user_id)->name ?? 'nell'}}</td>
                    <td>{{$i->date}}</td>
                    <td><a href="{{route('bill.showBillStream' , ['id' => $i->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $bills->links() !!}
        </div>
    </div>
@endsection
