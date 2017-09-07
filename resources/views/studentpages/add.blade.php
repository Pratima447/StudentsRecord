@extends('studentpages.default')

@section('content')

@if (Session::has('message'))
    <div class="alerts" >
        <p> {{ Session::get('message') }}</p>
    </div>
@endif
<link href="/css/main.css" rel="stylesheet">

@if (count($record)>0)
<form method ="post" action = "/stdrecord/edit/{{$record['id']}}">
{{ csrf_field() }}

<div class="stud_table">
    <label>Name: </label>
    <input required type="text" name = "sname" value="{{ $record->sname}}" />
    <br></br>


    <label>Age: </label>
    <input required type="integer" name = "age" value="{{ $record->age}}"/>
    <br></br>

    <label>Class: </label>
    <input required type="number" name = "class" value="{{ $record->class}}"/>
    <br></br>

    <label>Status: </label>
    <input required type="text" name = "status" value= " {{ $record->status}}"/>
    <br></br>

    <br>
    <input class="do_it-add" type="submit" textname="submit" value="Update" />

    <input class="do_it-add" type="Button" name="cancel" value="cancel" onclick="reseta()"/>

    <button class="do_it-add" type="button"
    onclick="window.location='/stdrecord/list'">View</button>
</div>

</form>

@else
<form method="post" action="/stdrecord/add" class="form" data-parsley-validate>
{{ csrf_field() }}

<div class="stud_table">
    <label>Name: </label>
    <input required type="text" name = "sname" data-parsley-trigger="input"/>
    <br></br>

    <label>Age: </label>
    <input required type="text" name = "age"/>
    <br></br>

    <label>Class: </label>
    <input requiredtype="text" name = "class"/>
    <br></br>

    <label>Staus: </label>
    <input required type="text" name = "status"/>
    <br></br>

    <br>
    
    <input class="do_it-add" type="submit" textname="submit" value="Submit" />

    <input class="do_it-add" type="Button" name="cancel" value="cancel" onclick="reseta()" href='#'/>

    <button class="do_it-add" type="button"
    onclick="window.location='/stdrecord/list'">View</button>
    
</div>
</form>

@endif
@endsection
