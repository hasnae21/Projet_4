<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneFormation;
use App\Models\Groupes;
use App\Models\PreparationBrief;
use App\Models\Tache;
use App\Models\Apprenant;
use App\Models\Brief;
use Illuminate\Support\Facades\DB;

class DashboardAPIController extends Controller
{

    public function years()
    {
        $years = AnneFormation::all();
        return $years;
    }

//     public function formation(Request $reaquest, $id)
//     {

//         $year = AnneFormation::findOrFail($id);
//         $group = Groupes::where('Annee_formation_id', $year->id)->first();
//         $studentCount = $group->students()->count();
//         $students = $group->students()->get();

//         foreach ($students as $student) {
//             $brief_ass = Brief::where('Apprenant_id', $student->id)->get();
//         }
//         foreach ($brief_ass as $brief) {
//             $brief_aff = PreparationBrief::where('id', $brief->Preparation_brief_id)->get();
//             //$brief_aff = PreparationBrief::where('id', $brief->Preparation_brief_id)->get();
//         }

//         ////////////////////////////////////////////
//         $brief_info = [];
//         $total_tasks_briefs = [];
//         $total_tasksDone_briefs = [];

//         foreach ($students as $student) {
//             foreach ($brief_ass as $brief) {

//                 $total_task_brief =  Tache::where('preparation_brief_id', $brief->Preparation_brief_id)
//                     ->get()->count();
//                 $total_taskDone_brief = Tache::where('preparation_brief_id', $brief->Preparation_brief_id)
//                     ->where('Etat', 'terminer')
//                     ->get()->count();

//                 if ($total_task_brief != 0) {
//                     $brief_av = (100 / $total_task_brief) * $total_taskDone_brief;
//                     $brief_name = PreparationBrief::where('id', $brief->Preparation_brief_id)->first()->Nom_du_brief;

//                     $arr1 = [
//                         'brief_av' => $brief_av,
//                         'brief_name' => $brief_name
//                     ];
//                     array_push($brief_info, $arr1);
//                 }

//                 array_push($total_tasks_briefs, $total_task_brief);
//                 array_push($total_tasksDone_briefs, $total_taskDone_brief);
//             }
//         }

//         array_pop($total_tasks_briefs);
//         array_pop($total_tasksDone_briefs);
//         $total_tasks_briefs_count = array_sum($total_tasks_briefs);
//         $total_tasksDone_briefs_count = array_sum($total_tasksDone_briefs);

//         if ($total_tasks_briefs_count != 0) {
//             $group_av = (100 / $total_tasks_briefs_count) * $total_tasksDone_briefs_count;
//         } else {
//             $group_av = 0;
//         }

//         return [
//             'year' => $year,
//             'group' => $group,
//             'studentCount' => $studentCount,
//             //'brief_aff' => $brief_aff,
//             'briefs' => collect($brief_info)->unique(),
//             'group_av' => $group_av
//         ];

// }

public function formation(Request $request, $id)
{
    $year = AnneFormation::findOrFail($id);
    $group = Groupes::where('Annee_formation_id', $year->id)
        ->first();
    $studentCount = $group->students->count();
    $total_done = Tache::where('Etat', '=', 'terminer')
        ->get()->count();
    $total_pause = Tache::where('Etat', '=', 'en pause')
        ->get()->count();
    $total_standby = Tache::where('Etat', '=', 'en cours')
        ->get()->count();
    $total_states = ($total_done + $total_pause + $total_standby);
    $group_progress = ($total_done * 100) / $total_states;

    return [
        'year' => $year,
        'group' => $group,
        'studentCount' => $studentCount,
        'group_av' => intval($group_progress),
    ];

}

}
