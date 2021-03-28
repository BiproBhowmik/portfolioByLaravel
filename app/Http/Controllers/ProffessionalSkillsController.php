<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProffessionalSkills;

class ProffessionalSkillsController extends Controller
{
    public function ajaxAddProffSkill(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonSkill' => 'required',
		]);
		$common = new ProffessionalSkills;

		$common->profSName = $request->commonName;
		$common->profSper = $request->commonSkill;

		$common->save();
		return response()->json($common);
    }

    public function proffSfindByIdAjax($id)
    {
    	$common = ProffessionalSkills::where('profSId',$id)
		->first();

		return response()->json($common);
    }

    public function ajaxDeleteProffSkill($id)
    {
    	$common = ProffessionalSkills::where('profSId',$id)
		->delete();

		return response()->json($common);
    }

    public function ajaxUpdateProffSkill(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		ProffessionalSkills::where('profSId',$request->commonId)->update(['profSName'=>$request->commonName, 'profSper'=>$request->commonSkill]);

		$common = ProffessionalSkills::select('*')
		->where('proffessional_skills.profSId','=',$request->commonId)
		->first();

		return response()->json($common);
    }

}
