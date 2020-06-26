@extends('dashboard.index')



@section('content')
    <div class="container">
        <!-- Horizontal Form -->
        <div class="card card-info mt-5">
            <div class="card-header">
                <p class="mt-2 font-weight-bold">تأكيد بعض البينات</p>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('user.store_data_conform')}}" method="post">
                @csrf
                <input type="hidden" value="{{$id}}" name="id">
                <div class="card-body">
                    <div class="form-group">
                        <label for="national_identity">رقم الهوية</label>
                        <input type="text" name="national_identity" class="form-control" id="national_identity">
                    </div>

                    <div class="form-group">
                        <label for="social_insurance_number">رقم الضمان الاجتماعي</label>
                        <input type="text" name="social_insurance_number" class="form-control" id="social_insurance_number">
                    </div>

                    <div class="form-group">
                        <label for="social_insurance_number">تاريخ الاشتراك في التأمين الاجتماعي</label>
                        <input type="date" name="data_subscribe_social" class="form-control" id="social_insurance_number">
                    </div>

                    <div class="form-group">
                        <label for="social_insurance_number">تاريخ بداية العقد</label>
                        <input type="date" name="contract_starting_date" class="form-control" id="social_insurance_number">
                    </div>

                    <div class="form-group">
                        <label for="social_insurance_number">تاريخ نهاية العقد</label>
                        <input type="date" name="contract_ending_date" class="form-control" id="social_insurance_number">
                    </div>

                    <div class="form-group">
                        <label for="social_insurance_number">قيمة الراتب</label>
                        <input type="text" name="salary" class="form-control" id="social_insurance_number">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">تأكيد البينات</button>
                    <button type="reset" class="btn btn-default float-right">تفريغ</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
