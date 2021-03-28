<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileLinkes;

class ProfileLinkesController extends Controller
{
    public function ajaxAddProfile(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'profileTitle' => 'required',
			'profileLink' => 'required',
		]);
		$common = new ProfileLinkes;

		$common->prlTitle = $request->profileTitle;
		$common->prlLink = $request->profileLink;

		$common->save();
		return response()->json($common);
    }

    public function ajaxDeleteProfile($id)
    {
    	$common = ProfileLinkes::where('prlId',$id)
		->delete();

		return response()->json($common);
    }
}
