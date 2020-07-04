@extends('dashboard.index')

@section('style')
    <style>
        th , td{
            text-align: center;
            font-size: 15px;
        }
        td{
            background-color: white;
        }
        th {
            font-size: 12px;
        }
        @media only screen and (max-width: 400px) {
            aside {
                display: none;
            }
        }

    </style>
@endsection

@section('content')


    <div class="container">

        <div class="mt-3">
            <div class="content mt-2 mb-4">
                {{ Breadcrumbs::render('soft_users') }}
            </div>



            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" rel="alert">
                    يوجد خطأ في تحديدث البينات حاول مجدداََ
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif


            <table class="table mt-3" style="padding: 30px;">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">إسم الموظف</th>
                    <th scope="col">الايميل</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">المسمي الوظفي</th>
                    <th scope="col">الجنس</th>
                    <th scope="col"></th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>
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
                        </td>
                        <td>
                            @switch($user->gender)
                                @case('m')
                                ذكر
                                @break
                                @case('f')
                                انثى
                                @break
                                @default
                            @endswitch
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success"
                                    data-toggle="modal" data-target="#restore"
                                    data-name="{{$user->name}}"
                                    data-id="{{$user->id}}"
                            >
                                <i class="fas fa-trash-restore-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>



        <!-- Modal -->
        <div class="modal fade" id="restore" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="name">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        من خلال هذه العملية انت تقوم بارجاع الموظف الي النظام.
                    </div>
                    <form action="{{route('user.restore.user')}}" method="post">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>



        @endsection

        @section('script')
            <script>

                $('#restore').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var name = button.data('name') // Extract info from data-* attributes
                    var id = button.data('id') // Extract info from data-* attributes


                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    // modal.find('.modal-title').text('New message to ' + recipient)
                    modal.find('#id').val(id)
                    modal.find('#name').text(name)

                })


            </script>
@endsection
