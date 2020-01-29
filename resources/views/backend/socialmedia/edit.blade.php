@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop

@section('content')
    @include('backend.messages.flash')
    @component('backend.shared.edit', ['pageTitle' => $pageTitle, 'pageDescription' => $pageDescription, 'row' => $row])
        <form action="{{route($pluralModelName . '.update', 1)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            @include('backend.'. $pluralModelName .'.form')
        </form>
    @endcomponent
@stop
