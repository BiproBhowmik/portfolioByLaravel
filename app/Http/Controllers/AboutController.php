<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function ajaxAddAboutText(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'abtText' => 'required',
		// ]);
		$about = new About;

		//dd($request);

		$about->abtText = $request->aboutText;

		$about->save();
		return response()->json($about);
    }

    public function ajaxUpdateAboutText(Request $request)
    {
		if (About::where('abtId',$request->abtId)
		->update(['abtText'=>$request->aboutText])) {
			return response()->json("Updated");
		} else
		{
			return response()->json("Not Updated");
		}
    }

    
}
