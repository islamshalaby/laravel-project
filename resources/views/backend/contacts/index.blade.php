@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop
@section('content')
    @include('backend.messages.flash')
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
                    Name
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Email
                </th>
                <th>
                    Message
                </th>
                <th>
                    Created Date
                </th>
                <th>
                    Updated Date
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
                        {{$row->name}}
                    </td>
                    <td>
                        {{$row->phone}}
                    </td>
                    <td>
                        {{isset($row->email) ? $row->email : 'No email'}}
                    </td>
                    <td>
                        {{Str::substr($row->message, 0, 50)}}
                    </td>
                    <td>
                        {{$row->created_at->diffforhumans()}}
                    </td>
                    <td>
                        {{$row->updated_at->diffforhumans()}}
                    </td>
                    <td class="td-actions text-right">
                        @include('backend.shared.buttons.show')
                        @include('backend.shared.buttons.delete')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endcomponent
@stop
