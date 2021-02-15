<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $tasks = Task::fromUser()
            ->applyFilters($data)
            ->latest()
            ->paginate(10);

        return view('tasks.index',[
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $dataValidated['user_id'] = Auth::id();
        Task::create($dataValidated);
        Session::put('store');

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where('user_id', Auth::id())
                    ->findOrFail($id);

        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataValidated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $task = Task::where('user_id', Auth::id())
                ->findOrFail($id);
        $task->fill($dataValidated);
        $task->save();
        Session::put('update');

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())
            ->findOrFail($id);
        $task->destroy($id);
        Session::put('destroy');

        return redirect('/tasks');
    }

    /**
     * Put complete in one task.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function completeTask($id)
    {
        $task = Task::where('user_id', Auth::id())
                ->findOrFail($id);
        $task->complete = true;
        $task->save();
        Session::put('completeTask');

        return redirect('/tasks');
    }
}
