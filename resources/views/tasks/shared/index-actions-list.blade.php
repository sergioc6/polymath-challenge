<div>
    <form action="{{ route('tasks.destroy' , ['task' => $task->id])}}" method="POST">
        @method('DELETE')
        @csrf

        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="btn btn-dark" title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>

        @if(!$task->complete)
            <a href="{{ route('tasks.complete', ['task' => $task->id]) }}" class="btn btn-info" title="Complete"><i class="fa fa-check" aria-hidden="true"></i></a>
        @endif

        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-warning" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

        <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true" ></i></button>
    </form>
</div>
