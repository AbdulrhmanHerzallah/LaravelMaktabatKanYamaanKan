@extends('dashboard.index')
@section('style')
    <style>
        td , th {
            text-align: center;
        }
    </style>
@endsection
@section('content')
<div class="container mt-5">




    <div class="content mt-2">
        {{ Breadcrumbs::render('event_listed') }}
    </div>

    <form action="{{route('listed_get_state')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="cat">عرض حالة المشروع حسب التصنيف</label>
            <div class="form-group">
                <select name="state" class="form-control col-6 d-inline-block" id="cat">
                    <option @if(old('state') == 'c') selected @endif value="c">مكتمل</option>
                    <option @if(old('state') == 'u') selected @endif value="u">غير مكتمل</option>
                </select>
                <button type="submit" class="btn btn-outline-primary mb-2" style="font-size: 12px"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>

    <a href="{{route('listed_event.index')}}" class="btn btn-outline-primary mb-2" style="font-size: 12px">جميع المشاريع المدرجة</a>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">العنوان</th>
            <th scope="col">بداية المشروع</th>
            <th scope="col">نهاية المشروع</th>
            <th scope="col">الحالة</th>
            <th scope="col">منشئ المشروع</th>
            <th scope="col">قائد المشروع</th>
            <th scope="col">منذ</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $i)
        <tr>
            <td>{{$i->title}}</td>
            <td>{{$i->start}}</td>
            <td>{{$i->end}}</td>
            <td>
                @switch($i->state)
                    @case('c')
                    <span class="text-success">مكتمل</span>
                    @break
                    @case('u')
                    <span class="text-danger">غير مكتمل</span>
                    @break
                    @default
                    <span class="text-danger">غير مكتمل</span>
                @endswitch
            </td>
            <td>{{\App\Models\User::find($i->user_id)->name ?? ''}}</td>
            <td>{{\App\Models\User::find($i->leader_id)->name ?? ''}}</td>
            <td>{{$i->created_at->diffForHumans()}}</td>
            <td>
                <form action="{{route('show_event.show' , ['id' => $i->id])}}" method="get">
                    <button type="submit" class="btn btn-outline-light text-left"><i class="far fa-eye"></i></button>
                </form>
            <td>
                @if($i->user_id || $i->leader_id != auth()->id())
                <button class="btn btn-outline-light text-left" data-toggle="modal" data-target="#update"
                        data-id="{{$i->id}}"
                        data-title="{{$i->title}}"
                        data-body="{{$i->body}}"
                        data-start="{{$i->start}}"
                        data-end="{{$i->end}}"
                        data-state="{{$i->state}}"
                        data-leader_id="{{$i->leader_id}}"
                        data-file_path="{{$i->file_path}}">
                    <i class="far fa-edit"></i></button></td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $events->links() !!}
    </div>
</div>
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title" id="">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('event.update-state')}}" method="post">
                    @csrf
                    <input type="hidden" id="id" name="id">

                        <div class="form-group">
                            <label for="state">تعديل حالة المشروع</label>
                            <select id="state" name="state" class="custom-select custom-select-sm">
                                <option id="c" value="c">مكتمل</option>
                                <option id="u" value="u">غير مكتمل</option>
                            </select>
                        </div>


                    <div  class="p-3">
                        <button type="submit" class="btn btn-primary">تحديث الحالة</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إالغاء</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#update').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let id = button.data('id') // Extract info from data-* attributes
        let title = button.data('title') // Extract info from data-* attributes
        let body = button.data('body') // Extract info from data-* attributes
        let start = button.data('start') // Extract info from data-* attributes
        let end = button.data('end') // Extract info from data-* attributes
        let state = button.data('state') // Extract info from data-* attributes
        let leader_id = button.data('leader_id') // Extract info from data-* attributes
        let file_path = button.data('file_path') // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.title').text(title)
        modal.find('#id').val(id)
        modal.find(`#${state}`).attr('selected' , true);
        // modal.find('.modal-body input').val(recipient)
    })
</script>
@endsection
