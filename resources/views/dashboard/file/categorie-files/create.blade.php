@extends('dashboard.index')

@section('style')

@endsection


@section('content')

    <div class="container">

        <div class="container mt-2">
            <div class="content mt-2 mb-4">
                {{ Breadcrumbs::render('file_cat') }}
            </div>
        </div>

        @if(Session::has('successes'))
            <div class="alert alert-success" role="alert">
                {{Session::get('successes')}}
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif

        <form action="{{route('file_cat.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">إسم التصنيف<span class="text-danger">*</span></label>
                <input name="category_name" type="text" value="{{old('category_name')}}" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted" style="font-size: 15px">ملاحظة التصنيف الجديد الذي ستقوم باضافته سيكون فريد ولا يمكن حذفه لكن تستطيع تعديل الاسم.</small>
                @error('category_name')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>

        <div class="d-none">{{$count = 1}}</div>
    </div>

    <table class="table table-dark mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">إسم التصنيف</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($fileCategorie as $item)
            <tr>
                <th scope="row">{{$count++}}</th>
                <td>{{$item->category_name}}</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update" data-id="{{$item->id}}" data-catname="{{$item->category_name}}"><i class="far fa-edit"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" data-id="{{$item->id}}" data-catname="{{$item->category_name}}"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        @endforeach

  </tbody>
    </table>









    <!-- Modal -->
    <div class="modal fade" id="update" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mt-2">
                    <form action="{{route('file_cat.update')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">إسم التصنيف<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="catname" name="cat_name">
                            <input type="hidden" value="" class="form-control" id="id" name="id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تحديث</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل تريد فعلاََ حذف التصنيف؟ لنجرب
                </div>
                <form action="{{route('file_cat.delete')}}" method="post">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">حذف</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection



@section('script')


    <script>
        $('#update').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var catname = button.data('catname') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#catname').val(catname)
            modal.find('#id').val(id)
        })

        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var name = button.data('catname') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#title').text(name)
            modal.find('#id').val(id)
        })
    </script>


@endsection
