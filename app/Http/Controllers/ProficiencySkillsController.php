<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProficiencySkills;

class ProficiencySkillsController extends Controller
{
    public function ajaxAddProficSkill(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonSkill' => 'required',
		]);
		$common = new ProficiencySkills;

		$common->proficSName = $request->commonName;
		$common->proficSper = $request->commonSkill;

		$common->save();
		return response()->json($common);
    }

    public function proficSfindByIdAjax($id)
    {
    	$common = ProficiencySkills::where('proficSId',$id)
		->first();

		return response()->json($common);
    }

    public function ajaxDeleteProficSkill($id)
    {
    	$common = ProficiencySkills::where('proficSId',$id)
		->delete();

		return response()->json($common);
    }

    public function ajaxUpdateProficSkill(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		ProficiencySkills::where('proficSId',$request->commonId)->update(['proficSName'=>$request->commonName, 'proficSper'=>$request->commonSkill]);

		$common = ProficiencySkills::select('*')
		->where('proficiency_skills.proficSId','=',$request->commonId)
		->first();

		return response()->json($common);
    }

}
