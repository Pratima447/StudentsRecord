@extends('studentpages.default')

@section('content')

<form name="demo" action="/">
    <link href="/css/main.css" rel="stylesheet">
    <input class="back" type="submit" value="Home"></input>
    <div class="options"> 
        <h2 style="text-align:center;"> This is demo project about Students. Walk around please..</h2>
    </div> 
    <div class="buttons btn-primary"><a href="/stdrecord/list"> View </a></div>
    <div class="buttons btn-primary"><a href="/stdrecord/add"> Add </a></div>

    
</form>
@endsection