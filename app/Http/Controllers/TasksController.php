<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tasks = Tasks::all();
        $tasks = Tasks::orderBy('created_at', 'DESC')->paginate(8);
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ]);
        $task = Tasks::create($validateData);

        if ($task) {
            $tasks = Tasks::orderBy('created_at', 'DESC')->paginate(8);
            return response()->json($tasks);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Tasks::findOrFail($id);
        //
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks, $id)
    {
        $task = Tasks::findOrFail($id);

        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $task->update($validateData);

        if ($task) {
            $tasks = Tasks::orderBy('created_at', 'DESC')->paginate(8);
            return response()->json(array("task"=>$task, "tasks"=>$tasks));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();

        if ($task) {
            $tasks = Tasks::orderBy('created_at', 'DESC')->paginate(8);
            return response()->json($tasks);
        }
    }
}
