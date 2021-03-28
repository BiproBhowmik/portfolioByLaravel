<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function ajaxAddEducation(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonSdate' => 'required',
			'commonInstitute' => 'required',
			'commonGpa' => 'required',
			'commonEdate' => 'required',
		]);
		$common = new Education;

		$common->eduTitle = $request->commonName;
		$common->eduBacg = $request->commonBg;
		$common->eduGpa = $request->commonGpa;
		$common->eduInsti = $request->commonInstitute;
		$common->eduStartingDate = $request->commonSdate;
		$common->eduEndingDate = $request->commonEdate;

		$common->save();
		return response()->json($common);
    }

    public function edufindByIdAjax($id)
    {
    	$common = Education::where('eduId',$id)
		->first();

		return response()->json($common);
    }

    public function ajaxDeleteedu($id)
    {
    	$common = Education::where('eduId',$id)
		->delete();

		return response()->json($common);
    }

    public function ajaxUpdateEdu(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		Education::where('eduId',$request->commonId)->update(['eduTitle'=>$request->commonName, 'eduBacg'=>$request->commonBg, 'eduGpa'=>$request->commonGpa, 'eduInsti'=>$request->commonInstitute, 'eduStartingDate'=>$request->commonSdate, 'eduEndingDate'=>$request->commonEdate]);

		$common = Education::select('*')
		->where('education.eduId','=',$request->commonId)
		->first();

		return response()->json($common);
    }
}
