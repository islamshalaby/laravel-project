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
