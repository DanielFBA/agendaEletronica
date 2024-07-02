<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DateTime;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get()->map(function ($task) {
            return [
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'start' => $task->begin_date,
                'end' => $task->end_date,
                'status' => $task->status,
                'start_date' => date('d/m/Y H:i', strtotime($task->begin_date)),
                'end_date' => date('d/m/Y H:i', strtotime($task->end_date)),
            ];
        });

        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'begin_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
        ]);

        $task = new Task();
        $task->user_id = auth()->user()->id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->begin_date = $request->begin_date;
        $task->end_date = $request->end_date;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return Inertia::render('Tasks/Edit', [
            'task' => $task
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'begin_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
        ]);

        $Task = Task::find($id);
        $Task->update($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
