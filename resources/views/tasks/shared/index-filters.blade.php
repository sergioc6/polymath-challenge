<div class="card">
    <div class="card-body">
        <form action="{{ route('tasks.index') }}" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Description" name="description" value="{{ app('request')->input('description') }}">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
            <a class="btn btn-info" href="{{ route('tasks.index') }}"><i class="fa fa-window-close" aria-hidden="true"></i> Clean</a>
        </form>
    </div>
</div>

