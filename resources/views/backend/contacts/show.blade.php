@extends('backend.layout.app')
@section('title')
    {{$pageTitle}}
@stop

@section('content')
    @component('backend.shared.show', ['row' => $row])
        <table class="table table-hover">
            <thead class="text-warning">
                <tr>
                    <th>Phone</th>
                    <td>{{$row->phone}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{isset($row->email) ? $row->email : 'No email'}}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{$row->message}}</td>
                </tr>
            </thead>

        </table>
    @endcomponent
@stop
