<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function goToAdmin(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'username' => 'required',
			'code' => 'required',
		]);

		$sessionCheck = Admin::select('*')
					->orderBy('adId', 'desc')
					->first();

			//dd($sessionCheck);
			//dd($sessionCheck->adUrName);

		if ($sessionCheck->adUrName == $request->username && $sessionCheck->adCode == $request->code) {
			$request->session()->put('username', $request->username);
			$request->session()->put('code', $request->code);
		}

    	
    	return redirect()->route('adminPage');;
    }

    public function adminPage()
    {
    	return view('backend/adminPage');

    }

    public function perInfoView()
    {
        return view('backend/perInfoView');

    }

    

    public function prtTitle()
    {
    	return view('backend/prtView');

    }
   
    public function about()
    {
        return view('backend/aboutView');

    }

    public function language()
    {
        return view('backend/languageView');

    }

        public function proffSkills()
    {
        return view('backend/proffSkillsView');

    }
    public function proficSkills()
    {
        return view('backend/proficSkillsView');

    }

    public function perSkills()
    {
        return view('backend/perSkillsView');

    }

    public function education()
    {
        return view('backend/educationView');

    }

    public function experance()
    {
        return view('backend/experanceView');

    }

        public function logOut()
    {
        if (session()->has('username') || session()->has('code'))
        {
            session()->pull('username');
            session()->pull('code');

        }        

        return redirect()->route('checkAdmin');

    }

        public function gallery()
    {

        return view('backend/galleryView');

    }

         public function proLinks()
    {

        return view('backend/proLinksView');

    }

    
    
}
