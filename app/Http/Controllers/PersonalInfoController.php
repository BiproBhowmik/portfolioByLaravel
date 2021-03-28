<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInfo;

class PersonalInfoController extends Controller
{
    public function ajaxAddPerInfo(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'fullName' => 'required',
			'phone' => 'required',
			'email' => 'required',
			'location' => 'required',
			'dob' => 'required',
		]);

		$prInfo = new PersonalInfo;

		$prInfo->fullName = $request->fullName;
		$prInfo->mobile = $request->phone;
		$prInfo->email = $request->email;
		$prInfo->location = $request->location;
		$prInfo->dob = $request->dob;

		$prInfo->save();
		return response()->json($prInfo);
    }

    public function ajaxUpdatePerInfo(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'fullName' => 'required',
			'phone' => 'required',
			'email' => 'required',
			'location' => 'required',
			'dob' => 'required',
		]);

		if (PersonalInfo::where('piId',$request->piId)
		->update(['fullName'=>$request->fullName, 'mobile'=>$request->phone, 'email'=>$request->email, 'location'=>$request->location, 'dob'=>$request->dob ])) {
			return response()->json("Updated");
		} else
		{
			return response()->json("Not Updated");
		}

		

		
    }

    
}
