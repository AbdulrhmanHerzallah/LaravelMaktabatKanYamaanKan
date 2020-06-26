@extends('dashboard.index')


@section('style')
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #133213;
            color: white;
            text-align: center;

        }
    </style>

@endsection


@section('content')
    <div class="container mt-2">
        <div class="container mt-2">
            <div class="content mt-2 mb-4">
                {{ Breadcrumbs::render('public_file') }}
            </div>
        </div>


        <div class="row mb-2">
            <div class="col-lg-6 mt-2">
                <form class="d-flex justify-content-center">
                    <select class="pb-1 col-6 form-control d-inline-block">
                        <option>التصنيف الاول</option>
                        <option>التصنيف الثاني</option>
                        <option>التصنيف الثالث</option>
                    </select>
                    <button type="submit" class="btn btn-outline-primary mr-2"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="col-lg-6 mt-2">
                <input type="text" class="form-control d-inline-block pt-1 col-8" placeholder="ابحث عن الملف">
                <button class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
            </div>



        </div>



        <table id="customers">
            <tr>
                <th>إسم الملف</th>
                <th>نوع الامتداد</th>
                <th>الحجم علي القرص</th>
                <th>المدة</th>
                <th></th>
            </tr>
            @foreach($files as $item)
                <tr>
                    <td>{{$item->original_name}}</td>
                    <td>{{$item->file_ext}}</td>
                    <td>{{'byte '.$item->size}}</td>
                    <td>{{$item->created_at->diffForhumans()}}</td>

                    <td>
                        <a href="{{route('my-go-file.download' , ['id' => $item->id])}}" class="btn btn-outline-primary font-weight-bold"><i class="fas fa-download"></i></a>
                    </td>
                </tr>
            @endforeach

        </table>
        <div class="d-flex justify-content-center mt-2">
            {{ $files->links() }}
        </div>
    </div>
@endsection
