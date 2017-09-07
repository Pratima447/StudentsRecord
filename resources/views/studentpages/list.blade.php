@extends('studentpages.default')

@section('content')

<link href="/css/main.css" rel="stylesheet">
@if (Session::has('message'))
    <div class="alerts" >
        <p> {{ Session::get('message') }}</p>
    </div>
@endif

    <div class="stud_table">
    <h2> STUDENT TABLE</h2>
    <table>
        <tr>
            <th>ID
            <th>StudenName
            <th>Age
            <th>Class
            <th>Status
            <th>Edit
            <th>Delete
            <th>Promote
    </tr>

    @foreach ($result as $res)
        <tr>
            <td>{{$res['id']}}</td> 
            <td>{{$res['sname']}}</td>
            <td>{{$res['age']}}</td>
            <td>{{$res['class']}}</td>
            <td>{{$res['status']}}</td>
            <td> <a href ="/stdrecord/edit/{{$res['id']}}"> Edit </a></td>
            
            <td> <a id='delete' onclick="deleteMe({{ $res->id }})" href='javascript:void(0)'> Delete </a></td>
            <td> <a id='promote' onclick="promoteMe({{ $res->id }})" href='javascript:void(0)'> Promote </a></td>
        </tr>
    @endforeach
    </table>

    <button class="do_it" type = "button" onclick="window.location='/stdrecord/add'">Add </button>
    <button class="do_it" type = "button" onclick="window.location='/stdrecord/demo'"> Menus </button>
    </div>

@stop

@section('scripts')

@stop