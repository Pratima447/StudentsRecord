@extends('studentpages.default')

@section('content')

<form name="home" action="/stdrecord/demo">
    <link href="/css/main.css" rel="stylesheet">

    <div class="square">
        <div class="home">
            <h1 style="text-align:center;"> Welcome to Demo Project!!! </h1>
        </div>
        <input class="start" type="submit" value="Start"></input>
    </div>
</form>
@endsection