<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
// use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        // return Task::all();
        return Task::select("*",DB::raw("TIMESTAMPDIFF(HOUR,Date_debut,Date_fin) AS Period"))->get();

    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->Date_debut = $request->Date_debut;
        $task->Date_fin = $request->Date_fin;
        $task->description = $request->description;
        $task->save();
    }

    public function edit($id)
    {
        return $task = Task::find($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->Date_debut = $request->Date_debut;
        $task->Date_fin = $request->Date_fin;
        $task->description = $request->description;
        $task->save();
    }
    
    public function destroy($id)
    {
        Task::where('id', $id)
            ->delete();
    }
    
}
