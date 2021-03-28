<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
	public function addGalaryImage(Request $request)
	{
		// dd($request);
		$validated = $request->validate([
			'imageTitle' => 'required',
			'profPicture' => 'required',
		]);

		$ProfTitle = new Gallery;

		if ($request->hasfile('profPicture')) {
			 //dd($request->profPicture);
			$ProfTitle->galTitle = $request->imageTitle;
			$ProfTitle->galPho = $request->profPicture->store('public/images');
			$ProfTitle->save();
		}


		return back()->with('success', 'Gallery Image Inserted Successfully');

	}

	public function ajaxDeleteGalleryImage($id)
	{
		$prtTitleAll = Gallery::select('*')->where('id',$id)->first();
		Storage::delete([$prtTitleAll->galPho]);

		$common = Gallery::where('id',$id)
		->delete();


		return response()->json($common);
	}

}
