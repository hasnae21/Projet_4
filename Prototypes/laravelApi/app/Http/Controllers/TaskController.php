<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        return Task::all();
    }


    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name_task;
        $task->save();
    }


    public function update(Request $request, $id)
    {
        Task::find($id)
            ->update([
            'name' => $request->name_task
            ]);
    }


    public function destroy($id)
    {
        Task::where('id', $id)
            ->delete();
    }

}
