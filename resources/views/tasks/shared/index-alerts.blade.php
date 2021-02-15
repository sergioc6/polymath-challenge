
@if(\Illuminate\Support\Facades\Session::exists('store'))
    @php(\Illuminate\Support\Facades\Session::forget('store'))
    <div class="alert alert-primary" role="alert">
        <strong>Task saved!</strong> Your new task has been saved successfully.
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::exists('update'))
    @php(\Illuminate\Support\Facades\Session::forget('update'))
    <div class="alert alert-primary" role="alert">
        <strong>Task updated!</strong> Your existing task has been successfully modified.
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::exists('destroy'))
    @php(\Illuminate\Support\Facades\Session::forget('destroy'))
    <div class="alert alert-primary" role="alert">
        <strong>Task deleted!</strong> Your task has been successfully deleted.
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::exists('completeTask'))
    @php(\Illuminate\Support\Facades\Session::forget('completeTask'))
    <div class="alert alert-primary" role="alert">
        <strong>Task completed!</strong> Your task has been marked as complete.
    </div>
@endif
