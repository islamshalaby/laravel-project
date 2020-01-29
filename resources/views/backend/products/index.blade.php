@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop
@section('content')
    @include('backend.messages.flash')
    @component('backend.shared.table', ['pageTitle' => $pageTitle, 'pageDescription' => $pageDescription])
        @slot('createButton')
            <div class="col-md-4 text-right">
                <a href="{{route($pluralModelName . '.create')}}" class="btn btn-white btn-round">Create {{$modelName}}</a>
            </div>
        @endslot
        <table class="table table-hover">
            <thead class="">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Name (English)
                </th>
                <th>
                    Sub Category
                </th>
                <th>
                    Created Date
                </th>
                <th>
                    Updated Date
                </th>
                <th>
                    Links
                </th>
                <th class="text-right">
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
                        {{$row->name_en}}
                    </td>
                    <td>
                        {{$row->sub_category->name_en}}
                    </td>
                    <td>
                        {{$row->created_at->diffforhumans()}}
                    </td>
                    <td>
                        {{$row->updated_at->diffforhumans()}}
                    </td>
                    <td>
                        <a href="{{route('products.links', $row->id)}}">
                            <i class="material-icons">
                                add
                            </i>
                        </a>
                    </td>
                    <td class="td-actions text-right">
                        @include('backend.shared.buttons.edit')
                        @include('backend.shared.buttons.delete')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endcomponent
@stop
