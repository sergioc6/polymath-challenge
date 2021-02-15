@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <h1>
            Task App
        </h1>
    </div>

    <div class="row justify-content-center">
        <a href="{{ route('tasks.index') }}">
            <img src="img/tasks-img.jpg" class="img-thumbnail" width="200" height="40" alt="Computer Hope">
        </a>
    </div>

</div>
@endsection
