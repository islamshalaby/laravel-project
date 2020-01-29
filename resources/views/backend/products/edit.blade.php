@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop

@section('content')
    @include('backend.messages.flash')
    @component('backend.shared.edit', ['pageTitle' => $pageTitle, 'pageDescription' => $pageDescription])
        <form action="{{route($pluralModelName . '.update', $row->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            @include('backend.'. $pluralModelName .'.form')
        </form>
        @slot('dropZone')
            <form id="myImages"  class="dropzone" method="post" action="{{route('products.images')}}">
                {{csrf_field()}}
                <input id="product_id" type="hidden" name="product_id" value="{{$row['id']}}">
            </form>
        @endslot
        @slot('productImages')
            <div class="row">
            @foreach($row->photos as $photo)
                <div class="col-md-2">
                    <div class="card card-profile">
                        <img src="{{$photo->file}}" style="width: 100%; display: inline-block; max-height: 100px" class="rounded" alt="" srcset="">
                        <form action="{{route('products.images.delete', $photo->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-round">Delete<div class="ripple-container"></div></button>
                        </form>

                    </div>
                </div>
            @endforeach
            </div>
        @endslot
    @endcomponent
@stop
@push('js')
    <script>
        $("#categoryProduct").on("change", function () {
            var categoryId = $(this).find("option:selected").val();
            $.ajax({
                url : "/admin/products/subcategories/" + categoryId,
                type : 'GET',
                success : function (data) {
                    data.forEach(function (subcategory) {
                        $('#subcategoryProduct').html(
                            "<option value='" + subcategory.id + "'>" + subcategory.name_en + "</option>"
                        )
                    })
                }
            })
        })

    </script>
@endpush
