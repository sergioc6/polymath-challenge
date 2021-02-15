@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Tasks edit</h1>

        <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST">
            @method('PUT')
            @csrf

            @include('tasks.shared.inputs', ['task' => $task])

            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>

            <a class="btn btn-primary" href="{{route('tasks.index')}}"><i class="fa fa-arrow-left"></i> Back</a>

        </form>

    </div>

@endsection
