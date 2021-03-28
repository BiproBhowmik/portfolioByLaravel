<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Languese;

class LangueseController extends Controller
{
        public function ajaxAddLanguage(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'langName' => 'required',
		]);
		$language = new Languese;

		$language->lanName = $request->langName;

		$language->save();
		return response()->json($language);
    }
        public function ajaxUpdateLanguage(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		Languese::where('lanId',$request->langId)->update(['lanName'=>$request->langName]);

		$Languese = Languese::select('*')
		->where('langueses.lanId','=',$request->langId)
		->first();

		return response()->json($Languese);
    }

    public function ajaxDeleteLanguage($id)
    {
    	$lang = Languese::where('lanId',$id)
		->delete();

		return response()->json($lang);
    }

    public function langfindByIdAjax($id)
    {
    	$lang = Languese::where('lanId',$id)
		->first();

		return response()->json($lang);
    }

    
}
