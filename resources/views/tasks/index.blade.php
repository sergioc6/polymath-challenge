@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Tasks list</h1>

        <div class="row justify-content-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
        </div>

        @include('tasks.shared.index-alerts')

        @include('tasks.shared.index-filters')

        <table class="table table-sm table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Complete</th>
                <th scope="col" style="width:  20%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ strlen($t->title) > 10 ? substr($t->title, 0, 10).'...' : $t->title }}</td>
                    <td>{{ strlen($t->description) > 50 ? substr($t->description, 0, 50).'...' : $t->description }}</td>
                    <td style="text-align: center">
                        @if ($t->complete)
                            <i class="fa fa-check"></i>
                        @else
                            <i class="fa fa-times-circle"></i>
                        @endif
                    </td>
                    <td>@include('tasks.shared.index-actions-list', ['task' => $t])</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center">
            {!! $tasks->appends($_GET)->links() !!}
        </div>

    </div>

@endsection
