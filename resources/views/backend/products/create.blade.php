@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop

@section('content')
    @component('backend.shared.create', ['pageTitle' => $pageTitle, 'pageDescription' => $pageDescription])
        <form action="{{route($pluralModelName . '.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('backend.'.$pluralModelName.'.form')
        </form>
    @endcomponent

@stop

@push('js')
    <script>
        $("#categoryProduct").on("change", function () {
            var categoryId = $(this).find("option:selected").val();
            $.ajax({
                url : "subcategories/" + categoryId,
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
