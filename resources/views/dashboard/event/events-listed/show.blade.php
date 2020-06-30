@extends('dashboard.index')

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="card-body">
            <p style="font-weight: bold">عنوان المشروع : <span class="font-weight-normal">{{$event->title}}</span></p>
            <p style="font-weight: bold">قائد المشروع : <span class="font-weight-normal">{{$leader}}</span></p>
            <p style="font-weight: bold">فترة إنشاء المشروع :<span class="font-weight-normal"> {{$event->created_at->diffForHumans()}} </span></p>
            <p style="font-weight: bold">حالة المشروع : <span class="font-weight-normal"><td>
                @switch($event->state)
                    @case('c')
                    <span class="text-success">مكتمل</span>
                    @break
                    @case('u')
                    <span class="text-danger">غير مكتمل</span>
                    @break
                    @default
                    <span class="text-danger">غير مكتمل</span>
                    @endswitch
                        </td></span></p>

            <hr>
            <p class="font-weight-bold text-success">تفاصيل المشروع :</p>
            <div>{{$event->body}}</div>
            <hr>
            <div class="d-flex justify-content-between font-weight-bold">
                <p class="text-success">بداية المشروع : {{$event->start}}</p>
                <p class="text-danger">نهاية المشروع : {{$event->end}}</p>
            </div>
            @if($event->file_path != null)
            <hr>
            <p class="font-weight-bold">ملف المشروع <a href="{{route('my_events.download_file' , ['id' => $event->id])}}" class="btn btn-outline-success mr-2"><i class="fas fa-download"></i></a></p>
            @endif
            <hr>
            <div>
                <p class="font-weight-bold">أعضاء الفريق : </p>
                <ol>
                    @foreach($members as $name)
                        <li>{{$name}}</li>
                    @endforeach
                </ol>
            </div>
            <hr>
            <form action="{{route('my_events.commit')}}" method="post">
                @csrf
                <label for="commit">أضف ملاحظة</label>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$event->id}}">
                    <textarea type="text" class="form-control" id="commit" name="commit"></textarea>
                    <button type="submit" class="btn btn-outline-primary mt-2">أضف ملاحضة</button>
                </div>
            </form>
            <div class="card-body">
                    @foreach($commits as  $item)
                            <p class="font-weight-bold">{{\App\Models\User::find($item->user_id)->name ?? ''}}<small class="font-weight-normal">{{' '.$item->updated_at->diffForHumans().' '}}</small>

                                @if($item->user_id == Auth::id())
                                    <button style="font-size: 9px" class="btn btn-primary mr-2" data-toggle="modal" data-target="#update_commit" data-id="{{$item->id}}" data-commit="{{$item->commit}}"><i class="fas fa-edit"></i></button>
                                    <button style="font-size: 9px" class="btn btn-danger" data-toggle="modal" data-target="#delete_commit" data-id="{{$item->id}}" data-commit="{{$item->commit}}"><i class="fas fa-trash"></i></button></p>
                                @endif
                            <div class="mb-2 mr-2">{{$item->commit}}</div>
                        <hr>
                    @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update_commit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الملاحظة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('my_events.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" id="id-name">
                        <textarea type="text" name="commit" class="form-control" id="commit-name"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تطبيق التحديث</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="delete_commit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف الملاحظة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('my_events.delete')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" id="id-name">
                        <p class="form-control" id="commit-name"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">حذف</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection


@section('script')
    <script>
        $('#update_commit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var commit = button.data('commit') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#commit-name').val(commit)
            modal.find('#id-name').val(id)
        })

        $('#delete_commit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var commit = button.data('commit') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#commit-name').text(commit)
            modal.find('#id-name').val(id)
        })


    </script>
@endsection
