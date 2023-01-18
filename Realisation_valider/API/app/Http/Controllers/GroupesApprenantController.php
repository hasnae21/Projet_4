<?php
// made by AHOUZI HASNAE
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
use App\Models\PreparationBrief;
use App\Models\groupes;
use App\Models\apprenant;

class GroupesApprenantController extends Controller
{
    public function index()
    {
        $promo = groupes::all();
        $brief = PreparationBrief::all();
        //$apprenants = apprenant::paginate(5);
        $apprenants = apprenant::all();
        return view('assign.index', ['brief' => $brief, 'promo' => $promo, 'apprenants' => $apprenants]);
    }

    public function filter_par_group(Request $request)
    {
        if ($request->has('filter') && !empty($request->filter)) {

            $apprenants = DB::table('apprenant')
                ->select("*")
                ->join('groupes_apprenant', 'apprenant.id', '=', 'groupes_apprenant.Apprenant_id')
                ->join('groupes', 'groupes_apprenant.Groupe_id', '=', 'groupes.id')
                ->where('groupes.id', 'Like', '%' . $request->filter . '%')
                ->get();

            return response(['apprenants' => $apprenants]);
        } else {
            $apprenants = Apprenant::all();
            return response(['apprenants' => $apprenants]);
            dd($apprenants);
        }
    }

    public function form_save(Request $request)
    {
        if ($request->has('select') && !empty($request->select)) {
            if ($request->has('check') && !empty($request->check)) {
                // dd($request);

                foreach ($request->check as $key => $name) {

                    DB::table('brief')->insert(
                        [
                            'Date_affectation' => Carbon::now(),
                            'Preparation_brief_id' => $request->input('select'),
                            'Apprenant_id' => $request->check[$key]
                        ]
                    );
                }

                return redirect()->back()->with(['success' => 'Brief assigner correctement']);

            } else {
                return back()->with(['fail' => 'Veuillez choisir les apprenants']);
            }
        } else {
            return back()->with(['fail' => 'Veuillez selectionner un Brief']);
        }
    }

}
