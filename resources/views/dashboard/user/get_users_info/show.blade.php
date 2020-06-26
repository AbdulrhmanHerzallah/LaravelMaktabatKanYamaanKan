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
    </style>
@endsection

@section('content')

    <div class="container mt-5">
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
            <table class="table mt-3">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">إسم الموظف</th>
                    <th scope="col">الايميل</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">المسمي الوظفي</th>
                    <th scope="col">رقم الهاوية</th>
                    <th scope="col">رقم الضمان الاجتماعي</th>
                    <th scope="col">الجنس</th>
                    <th scope="col">الراتب</th>
                    <th scope="col">تاريخ بداية العقد</th>
                    <th scope="col">تاريخ نهاية العقد</th>
                    <th scope="col">تاريخ الاشتراك في التأمين الاجتماعي</th>
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
                        <td>{{$user->national_identity}}</td>
                        <td>{{$user->social_insurance_number}}</td>
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
                        <td>{{$user->salary}}</td>
                        <td>{{$user->contract_starting_date}}</td>
                        <td>{{$user->contract_ending_date}}</td>
                        <td>{{$user->data_subscribe_social}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary"
                                    data-toggle="modal" data-target="#update_user"
                                    data-name="{{$user->name}}"
                                    data-id="{{$user->id}}"
                                    data-email="{{$user->email}}"
                                    data-phone="{{$user->phone_number}}"
                                    data-permission="{{$user->permission}}"
                                    data-nationalidentity="{{$user->national_identity}}"
                                    data-socialinsurancennumber="{{$user->social_insurance_number}}"
                                    data-gender="{{$user->gender}}"
                                    data-salary="{{$user->salary}}"
                                    data-contractstartingdate="{{$user->contract_starting_date}}"
                                    data-contractendingdate="{{$user->contract_ending_date}}"
                                    data-datasubscribesocial="{{$user->data_subscribe_social}}"
                            >
                                <i class="fas fa-user-edit"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                {{$users->links()}}
            </div>

    </div>



        <div class="modal fade" id="update_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_name"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{route('user.update_users')}}" method="post">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">البريد الالكتروني</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="emp-name">إسم الموظف</label>
                                    <input type="text" name="name" class="form-control" id="emp-name">
                                </div>

                                <div class="form-group">
                                    <label for="phone">رقم الهاتف</label>
                                    <input type="tel" name="phone_number" class="form-control" id="phone">
                                </div>

                                <div class="form-group">
                                    <label for="permission">الصلاحية</label>
                                    <select name="permission" class="form-control" id="permission">
                                        <option id="s1" value="1">مدير عام</option>
                                        <option id="s2" value="2">مدير فرع</option>
                                        <option id="s3" value="3">أمينة مكتبة</option>
                                        <option id="s4" value="4">موظف إدارة مالية</option>
                                        <option id="s5" value="5">مسؤول التواصل</option>
                                        <option id="s6" value="6">موظف إدارة التسويق</option>
                                        <option id="s7" value="7">مدير التسويق</option>
                                        <option id="s8" value="8">متعاون/متدرب</option>
                                        <option id="s9" value="9">متطوع</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="gender">الجنس</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option id="m" value="m">ذكر</option>
                                        <option id="f" value="f">إنثي</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nationalidentity">رقم الهوية</label>
                                    <input type="text" name="national_identity" class="form-control" id="nationalidentity">
                                </div>

                                <div class="form-group">
                                    <label for="social_insurance_number">رقم الضمان الاجتماعي</label>
                                    <input type="text" name="social_insurance_number" class="form-control" id="social_insurance_number">
                                </div>

                                <div class="form-group">
                                    <label for="data_subscribe_social">تاريخ الاشتراك في التأمين الاجتماعي</label>
                                    <input type="date" name="data_subscribe_social" class="form-control" id="data_subscribe_social">
                                </div>

                                <div class="form-group">
                                    <label for="contract_starting_date">تاريخ بداية العقد</label>
                                    <input type="date" name="contract_starting_date" class="form-control" id="contract_starting_date">

                                </div>

                                <div class="form-group">
                                    <label for="contract_ending_date">تاريخ نهاية العقد</label>
                                    <input type="date" name="contract_ending_date" class="form-control" id="contract_ending_date">

                                </div>

                                <div class="form-group">
                                    <label for="salary">قيمة الراتب</label>
                                    <input type="text" name="salary" class="form-control" id="salary">
                                </div>

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">تحديث البينات</button>
                                <button type="reset" class="btn btn-default float-right">تفريغ</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
    <script>
        $('#update_user').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var name = button.data('name') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes
            var email = button.data('email') // Extract info from data-* attributes
            var phone = button.data('phone') // Extract info from data-* attributes
            var permission = button.data('permission') // Extract info from data-* attributes
            var nationalidentity = button.data('nationalidentity') // Extract info from data-* attributes
            var socialInsurancenNumber = button.data('socialinsurancennumber') // Extract info from data-* attributes
            var gender = button.data('gender') // Extract info from data-* attributes
            var salary = button.data('salary') // Extract info from data-* attributes
            var contractStartingDate = button.data('contractstartingdate') // Extract info from data-* attributes
            var contractEndingDate = button.data('contractendingdate') // Extract info from data-* attributes
            var dataSubscribeSocial = button.data('datasubscribesocial') // Extract info from data-* attributes

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('#email').val(email)
            modal.find('#id').val(id)
            modal.find('#title_name').text(name)
            modal.find('#emp-name').val(name)
            modal.find('#phone').val(phone)
            modal.find('#gender').val(gender);
            modal.find(`#s${permission}`).attr('selected' , true);
            modal.find(`#${gender}`).attr('selected' , true)
            modal.find('#nationalidentity').val(nationalidentity)
            modal.find('#social_insurance_number').val(socialInsurancenNumber)
            modal.find('#salary').val(salary)
            modal.find('#contract_starting_date').val(contractStartingDate)
            modal.find('#contract_ending_date').val(contractEndingDate)
            modal.find('#data_subscribe_social').val(dataSubscribeSocial)
        })

    </script>
@endsection
