<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalTitle;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfessionalTitleController extends Controller
{
	public function ajaxAddPetTitle(Request $request)
	{
    	//dd($request);
    	// Validation
		$validated = $request->validate([
			'prtTitle' => 'required',
			'prtName' => 'required',
			'profPicture' => 'required',
			'covPicture' => 'required',
		]);
		$ProfTitle = new ProfessionalTitle;

		$ProfName->prtName = $request->prtName;
		$ProfTitle->prtTitle = $request->prtTitle;
		// dd($request->profPicture);
		$prtProPic->prtProPic = $request->profPicture->store('public/images');
		$prtCovPic->prtCovPic = $request->covPicture->store('public/images');;

		// $product->prImage = $request->exampleInputFile->store('public/images');

		$ProfTitle->save();
		return response()->json($ProfTitle);
	}

	public function ajaxUpdatePetTitle(Request $request)
	{
    	// Validation
		$validated = $request->validate([
			'prtTitle' => 'required',
		]);

		if (ProfessionalTitle::where('prtId',$request->prtId)->update(['prtTitle'=>$request->prtTitle]))
		{
			return response()->json("Updated");
		} 
		else
		{
			return response()->json("Not Updated");
		}

	}

	public function addPetTitle(Request $request)
	{
		$validated = $request->validate([
			'prtTitle' => 'required',
			'prtName' => 'required',
			'profPicture' => 'required',
			'covPicture' => 'required',
		]);

		$ProfTitle = new ProfessionalTitle;

		$ProfTitle->prtName = $request->prtName;
		$ProfTitle->prtTitle = $request->prtTitle;

		if ($request->hasfile('profPicture') && $request->hasfile('prtCovPic')) {
				 //dd($request->profPicture);
			$ProfTitle->prtProPic = $request->profPicture->store('public/images');
			$ProfTitle->prtCovPic = $request->covPicture->store('public/images');
		}

		$ProfTitle->save();

		return redirect()->route('prtTitle');

	}

	public function updatePetTitle(Request $request)
	{
		$validated = $request->validate([
			'prtTitle' => 'required',
			'prtName' => 'required',
			'profPicture' => 'required',
			'covPicture' => 'required',
		]);

		$prtTitleAll = ProfessionalTitle::select('*')->first();
		Storage::delete([$prtTitleAll->prtProPic, $prtTitleAll->prtCovPic]);

		$prtProPic = $request->profPicture->store('public/images');
		$prtCovPic = $request->covPicture->store('public/images');


		ProfessionalTitle::where('prtId',$request->prtId)
		->update(['prtTitle'=>$request->prtTitle,'prtName'=>$request->prtName,'prtProPic'=>$prtProPic,'prtCovPic'=>$prtCovPic]);

		return redirect()->route('prtTitle')->with("success", "Updated Successfully");

	}
}
