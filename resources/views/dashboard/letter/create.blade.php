@extends('dashboard.index')

@section('content')
<div class="container mt-4">

<form action="{{route('letter.store')}}" method="post">
    @csrf

    <label for="title">{{__('layout.title')}}</label>
    <input id="title" name="title" class="form-control mb-3 @error('title') is-invalid @enderror " placeholder="@error('title') {{$message}} @enderror">

    @error('body')

    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>

    @enderror
    <textarea name="body" id="compose-textarea" class="form-control" style="height: 900px;z-index: 90"></textarea>
    <button type="submit" name="save_and_create" class="btn btn-primary btn-sm mb-4">{{__('layout.save_create_new_letter')}}</button>
    <input type="submit" name="just_create" value="{{__('layout.just_create_new_letter')}}" class="btn btn-outline-dark btn-sm mb-4">
   </form>
</div>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-ar-AR.min.js" integrity="sha256-rH047tiLgw9l5v/KBXIwdarKNUl8qNA//GpULoiys8E=" crossorigin="anonymous"></script>
    <script>
    $(function () {
        //Add text editor
        $('#compose-textarea').summernote({
            lang : "ar-AR",
            height: 300,
        })
    })
</script>
@endsection

