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
            {{ Breadcrumbs::render('my_bills') }}
        </div>

        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">إسم العميل</th>
                <th scope="col">رقم هاتف العميل</th>
                <th scope="col">عنوان العميل</th>
                <th scope="col">قيمة الضريبة</th>
                <th scope="col">نوع الفاتورة</th>
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
                <td>{{$i->date}}</td>
                <td>
                    <form action="{{route('bill.showBillStream' , ['id' => $i->id])}}" method="GET">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                    </form>
{{--                    <a href="{{route('bill.showBillStream' , ['id' => $i->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>--}}
                </td>
                <td>
         <button href="{{route('bill.showBillStream' , ['id' => $i->id])}}"
                 class="btn btn-danger" data-toggle="modal" data-target="#del" data-id="{{$i->id}}"><i class="fas fa-trash"></i></button>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $bills->links() !!}
        </div>
    </div>


    <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <form action="{{route('bill-del')}}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-danger">نعم</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                    </form>

                </div>
            </div>
        </div>
    </div>






@endsection

@section('script')
    <script>
        $('#del').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('#id').val(id)
        })
    </script>
@endsection
