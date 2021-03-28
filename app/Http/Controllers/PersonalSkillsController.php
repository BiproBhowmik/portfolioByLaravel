<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalSkills;

class PersonalSkillsController extends Controller
{
    public function ajaxAddPerSkill(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonSkill' => 'required',
		]);
		$common = new PersonalSkills;

		$common->perSName = $request->commonName;
		$common->perSper = $request->commonSkill;

		$common->save();
		return response()->json($common);
    }

    public function perSfindByIdAjax($id)
    {
    	$common = PersonalSkills::where('perSId',$id)
		->first();

		return response()->json($common);
    }

    public function ajaxDeletePerSkill($id)
    {
    	$common = PersonalSkills::where('perSId',$id)
		->delete();

		return response()->json($common);
    }

    public function ajaxUpdatePerSkill(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		PersonalSkills::where('perSId',$request->commonId)->update(['perSName'=>$request->commonName, 'perSper'=>$request->commonSkill]);

		$common = PersonalSkills::select('*')
		->where('personal_skills.perSId','=',$request->commonId)
		->first();

		return response()->json($common);
    }
}
