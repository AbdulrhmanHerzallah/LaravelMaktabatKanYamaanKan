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
            background-color: #4CAF50;
            color: white;
            text-align: center;

        }
    </style>

@endsection


@section('content')

    <div class="container mt-2">
        <div class="container mt-2">
            <div class="content mt-2 mb-4">
                {{ Breadcrumbs::render('all_files_admin') }}
            </div>
        </div>
    <table id="customers">
        <tr>
            <th>إسم الملف</th>
            <th>نوع الامتداد</th>
            <th>الحجم علي القرص</th>
            <th>الصلاحية عام/خاص</th>
            <th>صاحب الملف</th>
            <th>التصنيف</th>
            <th>المدة</th>
            <th></th>
        </tr>
        @foreach($files as $item)
            <tr>
                <td>{{$item->original_name}}</td>
                <td>{{$item->file_ext}}</td>
                <td>{{$item->size}}</td>
                <td>
                    @if($item->power == 1)
                        خاص
                    @else
                        عام
                    @endif
                </td>
                <td>{{\App\Models\User::find($item->user_id)->name ?? ''}}</td>
                <td>{{\App\Models\FileCategorie::find($item->cat_id)->category_name ?? ''}}</td>
                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>

                <td>
                    <a href="{{route('my-go-file.download' , ['id' => $item->id])}}" class="btn btn-outline-primary font-weight-bold"><i class="fas fa-download"></i></a>
{{--                    <a href="#" class="btn btn-outline-dark font-weight-bold mt-1"><i class="fas fa-edit"></i></a>--}}
{{--                    <a href="#" class="btn btn-outline-danger font-weight-bold mt-1" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash"></i></a>--}}
                </td>
            </tr>
        @endforeach

    </table>
    <div class="d-flex justify-content-center mt-2">
        {{ $files->links() }}
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>











@endsection
