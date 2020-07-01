{{--<div class="col-lg-3 col-6">--}}
    <!-- small box -->
{{--    <div class="small-box bg-info">--}}
{{--        <div class="inner">--}}
{{--            <h3>150</h3>--}}

{{--            <p>عدد مبيعات الكتب</p>--}}
{{--        </div>--}}
{{--        <div class="icon">--}}
{{--            <i class="ion ion-bag"></i>--}}
{{--        </div>--}}
{{--        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{App\Models\Bill::count() ?? 0}}</h3>

            <p>عدد الفواتير</p>
        </div>
        <div class="icon">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
        </div>
{{--        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>
{{--<!-- ./col -->--}}
<div class="col-lg-3 col-6 text-white">
    <!-- small box -->
    <div class="small-box" style="background-color: #2e86de">
        <div class="inner">
            <h3>{{App\Models\Event::count() ?? '0'}}</h3>

            <p>عدد المشاريع</p>
        </div>
        <div class="icon">
            <i class="far fa-calendar-alt nav-icon"></i>
        </div>
{{--        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6 text-dark">
    <!-- small box -->
    <div class="small-box" style="background-color: #fdcb6e">
        <div class="inner">
            <h3>--</h3>

            <p>عدد الكتب المستعارة</p>
        </div>
        <div class="icon">
            <i class="fas fa-book-open"></i>
        </div>
{{--        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #c8d6e5">
        <div class="inner">
            <h3>{{App\Models\File::count() ?? '0'}}</h3>

            <p>عدد الملفات المخزنة</p>
        </div>
        <div class="icon">
            <i class="far fa-file-alt"></i>
        </div>
{{--        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>

<div class="col-lg-3 col-6 text-white">
    <!-- small box -->
    <div class="small-box" style="background-color: #10ac84">
        <div class="inner">
            <h3>{{App\Models\Letter::count() ?? '0'}}</h3>

            <p>مجمل عدد الخطابات</p>
        </div>
        <div class="icon">
            <i class="far fa-envelope"></i>
        </div>
{{--        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>

<div class="col-lg-3 col-6 text-white">
    <!-- small box -->
    <div class="small-box" style="background-color: #2d3436">
        <div class="inner">
            <h3>{{App\Models\User::count() ?? 1}}<sup style="font-size: 20px"></sup></h3>

            <p>عدد المشتركين</p>
        </div>
        <div class="icon">
            <i class="far fa-user"></i>
        </div>
{{--        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>
