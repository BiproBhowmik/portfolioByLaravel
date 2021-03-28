<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function ajaxAddExperience(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonPost' => 'required',
			'commonPosi' => 'required',
			'commonCompany' => 'required',
			'commonSdate' => 'required',
			'commonEdate' => 'required',
		]);
		$common = new Experience;

		$common->expPost = $request->commonPost;
		$common->expPosition = $request->commonPosi;
		$common->expCopN = $request->commonCompany;
		$common->expStartingDate = $request->commonSdate;
		$common->expEndingDate = $request->commonEdate;

		$common->save();
		return response()->json($common);
    }

    public function expfindByIdAjax($id)
    {
    	$common = Experience::where('expId',$id)
		->first();

		return response()->json($common);
    }

    public function ajaxDeleteexp($id)
    {
    	$common = Experience::where('expId',$id)
		->delete();

		return response()->json($common);
    }

    public function ajaxUpdateExp(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		Experience::where('expId',$request->commonId)->update(['expPost'=>$request->commonPost, 'expPosition'=>$request->commonPosi, 'expCopN'=>$request->commonCompany, 'expStartingDate'=>$request->commonSdate, 'expEndingDate'=>$request->commonEdate]);

		$common = Experience::select('*')
		->where('experiences.expId','=',$request->commonId)
		->first();

		return response()->json($common);
    }
}
