@extends('dashboard.index')

@section('content')
    <div class="container mt-4">
        <div class="content mt-2">
            {{ Breadcrumbs::render('show_my_latters') }}
        </div>

        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">عنوان الخطاب</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($latter as $i)
            <tr>
                <td>{{$i->title}}</td>
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
