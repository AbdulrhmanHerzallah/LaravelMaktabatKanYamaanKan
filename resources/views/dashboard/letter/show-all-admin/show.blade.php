@extends('dashboard.index')

@section('style')
    <style>
        td , th {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="content mt-2">
            {{ Breadcrumbs::render('emp_letters') }}
        </div>

        <table class="table table-success">
            <thead>
            <tr>
                <th scope="col">عنوان الخطاب</th>
                <th scope="col">منشئ الخطاب</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($latter as $i)
                <tr>
                    <td>{{$i->title}}</td>
                    <td>{{\App\Models\User::find($i->user_id)->name ?? ''}}</td>
                    <td>{{$i->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('letter.download' , ['id' => $i->id])}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $latter->links() !!}
        </div>

    </div>
@endsection
