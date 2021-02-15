@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Task #{{ $task->id }}</h1>

        <div class="card">
            <div class="card-header">
                {{ $task->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{ $task->description }}</p>
                <h5 class="card-title">State</h5>
                <p class="card-text">{{ $task->complete ? 'Complete' : 'Incomplete' }}</p>
            </div>
        </div>

        <a class="btn btn-primary" href="{{route('tasks.index')}}"><i class="fa fa-arrow-left"></i> Back</a>

    </div>

@endsection
