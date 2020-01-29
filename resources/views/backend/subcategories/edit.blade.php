@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop

@section('content')
    @component('backend.shared.edit', ['pageTitle' => $pageTitle, 'pageDescription' => $pageDescription])
        <form action="{{route($pluralModelName . '.update', $row->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            @include('backend.'. $pluralModelName .'.form')
        </form>
    @endcomponent
@stop
