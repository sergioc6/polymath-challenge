
<div class="form-group">
    <label for="title">Task title</label>
    <input type="text" class="form-control" id="title" name="title" required placeholder="Title" value="{{ isset($task) ? $task->title : old('title') }}" maxlength="255">
    <span class="text-danger">{{ $errors->first('title') }}</span>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea style="resize:none" maxlength="1000" required class="form-control" id="description" name="description" rows="5">{{ isset($task) ? $task->description : old('description') }}</textarea>
    <span class="text-danger">{{ $errors->first('description') }}</span>
</div>
