@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="content mt-2">
            {{ Breadcrumbs::render('bill_create') }}
        </div>
        <div id="alert-danger" class="alert alert-danger d-none" role="alert">
                {{__('messages.bill_alert')}}
            </div>
        <div id="alert-success" class="alert alert-success d-none" role="alert"></div>
        <form target="_blank" action="{{route('bill.print_bill')}}" method="post" id="form_data">
            @csrf
            <div class="form-row">

                <div class="col">
                    <label for="clint_name">{{__('layout.clint_name')}} <span class="text-danger">*</span></label>
                    <input id="clint_name" name="clint_name" class="form-control mb-3 @error('clint_name') is-invalid @enderror"
                           placeholder="" value="{{old('clint_name')}}">
                </div>
                <div class="col">
                    <label for="clint_phone">{{__('layout.clint_phone')}} <span class="text-danger">*</span></label>
                    <input id="clint_phone" name="clint_phone" class="form-control mb-3 @error('clint_phone') is-invalid @enderror"
                           placeholder="" value="{{old('clint_phone')}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="bill_number">{{__('layout.bill_number')}}<span class="text-danger">*</span></label>
                    <input type="text" id="bill_number" name="bill_number" class="form-control mb-3 @error('bill_number') is-invalid @enderror"
                           placeholder="" value="{{$rand_number}}">
                </div>

                <div class="col">
                    <label for="clint_address">{{__('layout.clint_address')}} <span class="text-danger">*</span></label>
                    <input id="clint_address" name="clint_address" class="form-control mb-3 @error('clint_address') is-invalid @enderror"
                           placeholder="" value="{{old('clint_address')}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="tax">{{__('layout.bill_tax')}}</label>
                    <input min="0" max="100" type="number" id="tax" name="tax" class="form-control mb-3 @error('tax') is-invalid @enderror"
                           placeholder="" value="{{old('bill_tax')}}">
                </div>
                <div class="col-6">
                    <label for="bill_type">نوع الفاتورة</label>
                    <select name="bill_type" class="form-control" id="bill_type">
                        <option selected value="">حدد نوع الفاتورة</option>
                        <option value="فاتورة AK">فاتورة</option>
                        <option value="عرض سعر">عرض سعر</option>
                        <option value="سند قبض">سند قيض</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-success mb-2" id="add">+</button>
            <div id="product">
            <div class="form-row">
                <div class="col">
                    <label for="product_name_0">{{__('layout.product_name')}} <span class="text-danger">*</span></label>
                    <input id="product_name_0" name="product_name[]" class="form-control mb-3 @error('product_name.0') is-invalid @enderror"
                           placeholder="" value="{{old('product_name.0')}}">
                </div>

                <div class="col">
                    <label for="price_0">{{__('layout.price')}} <span class="text-danger">*</span></label>
                    <input id="price_0" type="number" min="1" name="price[]" class="form-control mb-3 @error('price.0') is-invalid @enderror"
                           placeholder="" value="{{old('price.0')}}">
                </div>

                <div class="col">
                    <label for="quantity_0">{{__('layout.quantity')}}</label>
                    <input id="quantity_0" type="number" min="1" name="quantity[]" class="form-control mb-3 @error('quantity.0') is-invalid @enderror"
                           placeholder="" value="{{old('quantity.0' , 1)}}">
                </div>
                <div class="col">
                    <label for="dis_account_0">{{__('layout.discount').'_%'}}</label>
                    <input id="dis_account_0" min="0" max="100" type="number" name="dis_account[]" class="form-control mb-3 @error('dis_account.0') is-invalid @enderror"
                           placeholder="" value="{{old('dis_account.0' , 0)}}">
                </div>
                <div class="col">
                    <label for="note_0">{{__('layout.note')}}</label>
                    <input id="note_0" type="text" name="note[]" class="form-control mb-3 @error('note.0') @enderror"
                           placeholder="" value="{{old('note.0')}}">
                </div>
                <input type="hidden" value="{{old('index_val')}}" id="index" name="index_val">
            </div>
         </div>


     @for ($i = 1; $i <= old('index_val'); $i++)
            <div class="form-row" id="item-{{$i}}">
                <div class="col">
                    <label for="product_name_{{$i}}">{{__('layout.product_name')}}</label>
                    <input id="product_name_{{$i}}" name="product_name[]" class="form-control mb-3 @error('product_name.'.$i) is-invalid @enderror"
                           placeholder="" value="{{old('product_name.'.$i)}}">
                </div>

                <div class="col">
                    <label for="price_{{$i}}">{{__('layout.price')}}</label>
                    <input id="price_{{$i}}" min="1" name="price[]" class="form-control mb-3 @error('price.'.$i) is-invalid @enderror"
                           placeholder="" value="{{old('price.'.$i)}}">
                </div>

                <div class="col">
                    <label for="quantity_{{$i}}">{{__('layout.quantity')}}</label>
                    <input type="number" id="quantity_{{$i}}" name="quantity[]" class="form-control mb-3 @error('quantity.'.$i) is-invalid @enderror"
                           placeholder="" min="1" value="{{old('quantity.'.$i , 1)}}">
                </div>
                <div class="col">
                    <label for="dis_account_{{$i}}">{{__('layout.discount').'_%'}}</label>
                    <input min="0" max="100" type="number" id="dis_account_{{$i}}" name="dis_account[]" class="form-control mb-3 @error('dis_account.'.$i) is-invalid @enderror"
                           placeholder="" value="{{old('dis_account.'.$i , 0)}}">
                </div>
                <div class="col">

                    <label for="note_{{$i}}">{{__('layout.note')}}</label>
                    <input type="text" id="note_{{$i}}" name="note[]" class="form-control mb-3 @error('note.'.$i) is-invalid @enderror"
                           placeholder="" value="{{old('note.'.$i)}}">
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col"><button type="button" onclick="del({{$i}})" class="btn btn-dark">-</button></div>
                </div>
            </div>
    @endfor
            <div class="btn-group mb-4">
                <button type="submit" id="save" class="btn btn-info btn-flat">{{__('layout.save_bill')}}</button>
                <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, -2px, 0px);">
                    <button class="dropdown-item" type="submit" name="printer">{{__('layout.create_bill_printer')}}</button>
                </div>
            </div>

        </form>
    </div>

@endsection

@section('script')
<script>
    let count = 0 ? count = 0 : $('#index').val();
    $(document).ready(function () {
        $('#add').click(function () {
            count++
            $('#index').val(count)
            $('#product').append(`
                <div class="form-row" id="item-${count}">
                <div class="col">
                    <label for="product_name_${count}">{{__('layout.product_name')}}</label>
                    <input id="product_name_${count}" name="product_name[]" class="form-control mb-3"
                           placeholder="">
                </div>

                <div class="col">
                    <label for="price_${count}">{{__('layout.price')}}</label>
                    <input type="number" id="price_${count}" name="price[]" class="form-control mb-3"
                           placeholder="">
                </div>

                <div class="col">
                    <label for="quantity_${count}">{{__('layout.quantity')}}</label>
                    <input type="number" min="1" id="quantity_${count}" name="quantity[]" class="form-control mb-3"
                           placeholder="" value="1">
                </div>
                <div class="col">
                    <label for="dis_account_${count}">{{__('layout.discount').'_%'}}</label>
                    <input min="0" max="100" type="number" id="dis_account_${count}" name="dis_account[]" class="form-control mb-3"
                           placeholder="" value="0">
                </div>
                <div class="col">

                    <label for="note_${count}">{{__('layout.note')}}</label>
                    <input type="text" id="note_${count}" name="note[]" class="form-control mb-3"
                           placeholder="" value="{{old('note[]')}}">
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col"><button type="button" onclick="del(${count})" class="btn btn-dark">-</button></div>
                </div>
            </div>
            `)
        })
        $('#save').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url : '{{route('bill.store')}}',
                method:'post',
                data : $('#form_data').serialize(),
                dataType : 'json',
                success:function(data)
                {
                    let input = document.getElementsByClassName("form-control");
                    for (let i = 0; i < input.length; i++) {
                        document.getElementsByClassName("form-control")[i].classList.remove("is-invalid");
                    }
                    $('#alert-success').addClass('d-block');
                    $('#alert-success').text(data.success);

                    $('#alert-danger').removeClass('d-block');

                },
                error: function(xhr, status, error) {

                    var err = xhr.responseJSON;
                    // eval("(" + xhr.responseText + ")");
                    let input = document.getElementsByClassName("form-control");
                    for (let i = 0; i < input.length; i++) {
                        document.getElementsByClassName("form-control")[i].classList.remove("is-invalid");
                    }
                        for(i in Object.keys(err.errors))
                        {
                            $(`#${Object.keys(err.errors)[i].replace(/\./gi, "_")}`).addClass('is-invalid')
                            $('#alert-danger').addClass('d-block')
                        }
                    $('#alert-success').removeClass('d-block');

                }
            })
        })
    })
function del(i) {
    $(`#item-${i}`).remove();
    count--
    $('#index').val(count)
}

// function max_val(d){
//     $(`#dis_account_${d}`).attr({
//         min : ($(`#price_${d}`).val() - 1) * -1
//     })
// }
</script>
@endsection
