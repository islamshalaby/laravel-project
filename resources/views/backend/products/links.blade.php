@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop
@section('content')
    @include('backend.messages.flash')
    <form action="{{route('products.addLinks', $productId)}}" method="post">
        {{csrf_field()}}

        <div class="col-md-12" id="types">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Website</label>
                <input type="checkbox" name="web" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Google play</label>
                <input type="checkbox" name="google" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Apple store</label>
                <input type="checkbox" name="apple" class="form-control">
            </div>
        </div>
        @php
            $input = "type[]"
        @endphp
        <div id="linksContainer">

        </div>
        <button type="submit" class="btn btn-primary btn-round">Add<div class="ripple-container"></div></button>
    </form>
    @component('backend.shared.table', ['pageTitle' => $pageTitle, 'pageDescription' => $pageDescription])
        @slot('createButton')
            <div class="col-md-4 text-right">
            </div>
        @endslot
        <table class="table table-hover">
            <thead class="">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Type
                </th>
                <th>
                    Link
                </th>
                <th>
                    Created Date
                </th>
                <th>
                    Updated Date
                </th>
                <th>
                    Control
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)
                <tr>
                    <td>
                        {{$row->id}}
                    </td>
                    <td>
                        @if($row->type == 1)
                        Website
                        @elseif($row->type == 2)
                        Google play
                        @else
                        Apple store
                        @endif
                    </td>
                    <td>
                        {{$row->link}}
                    </td>
                    <td>
                        {{$row->created_at->diffforhumans()}}
                    </td>
                    <td>
                        {{$row->updated_at->diffforhumans()}}
                    </td>
                    <td>
                        <button type="button" rel="tooltip" onclick="$(this).closest('tr').next('tr').slideToggle()" class="btn btn-white btn-link btn-sm" data-original-title="Edit Link">
                            <i class="material-icons">edit</i>
                        </button>
                        <form action="{{route('product.link.delete', $row->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                            <button type="submit" rel="tooltip" onclick="return confirm('Are you sure?')" class="btn btn-white btn-link btn-sm" data-original-title="Delete Link">
                                <i class="material-icons">close</i>
                            </button>
                        </form>
                    </td>

                </tr>
                <tr style="display: none">
                    <td>

                    </td>

                    <td>

                    </td>

                    <td>
                        <form action="{{route('product.link.edit', $row->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="col-md-12" id="types">
                                <div class="form-group bmd-form-group">
                                    <input type="text" name="link" value="{{$row->link}}" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-round">Edit<div class="ripple-container"></div></button>
                        </form>
                    </td>
                    <td>

                    </td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endcomponent
@stop

@push('js')
    <script>
        $("#types input[name='web']").on('click', function () {
            if ($(this).is(':checked')) {
                $("#linksContainer").append('<div class="col-md-12 web">' +
                    '<div class="form-group bmd-form-group">' +
                    '<label class="bmd-label-floating">Website link</label>' +
                    '<input type="text" name="link[]" class="form-control">' +
                    '<input type="hidden" name="type[]" value="1" class="form-control">' +
                    '</div>' +
                    '</div>')
            }else {
                $("#linksContainer .web").remove()
            }
        })
        $("#types input[name='google']").on('click', function () {
            if ($(this).is(':checked')) {
                $("#linksContainer").append('<div class="col-md-12 google">' +
                    '<div class="form-group bmd-form-group">' +
                    '<label class="bmd-label-floating">Google play link</label>' +
                    '<input type="text" name="link[]" class="form-control">' +
                    '<input type="hidden" name="type[]" value="2" class="form-control">' +
                    '</div>' +
                    '</div>')
            }else {
                $("#linksContainer .google").remove()
            }
        })
        $("#types input[name='apple']").on('click', function () {
            if ($(this).is(':checked')) {
                $("#linksContainer").append('<div class="col-md-12 apple">' +
                    '<div class="form-group bmd-form-group">' +
                    '<label class="bmd-label-floating">Apple store link</label>' +
                    '<input type="text" name="link[]" class="form-control">' +
                    '<input type="hidden" name="type[]" value="3" class="form-control">' +
                    '</div>' +
                    '</div>')
            }else {
                $("#linksContainer .apple").remove()
            }
        })
    </script>
@endpush
