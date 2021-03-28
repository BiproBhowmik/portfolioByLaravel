<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\ProfessionalTitleController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LangueseController;
use App\Http\Controllers\ProffessionalSkillsController;
use App\Http\Controllers\ProficiencySkillsController;
use App\Http\Controllers\PersonalSkillsController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileLinkesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('fontend/welcome');
})->name('portfolio');



Route::get('/joy', function () {
	return view('backend/checkAdmin');
})->name('checkAdmin');

Route::prefix('admin')->group(function(){
	Route::post('goToAdmin', [AdminController::class, 'goToAdmin'])->name('goToAdmin');
	Route::get('adminPage', [AdminController::class, 'adminPage'])->name('adminPage');
	Route::get('perInfoView', [AdminController::class, 'perInfoView'])->name('perInfoView');
	Route::get('prtTitle', [AdminController::class, 'prtTitle'])->name('prtTitle');
	Route::get('about', [AdminController::class, 'about'])->name('about');
	Route::get('language', [AdminController::class, 'language'])->name('language');
	Route::get('proffSkills', [AdminController::class, 'proffSkills'])->name('proffSkills');
	Route::get('proficSkills', [AdminController::class, 'proficSkills'])->name('proficSkills');
	Route::get('perSkills', [AdminController::class, 'perSkills'])->name('perSkills');
	Route::get('education', [AdminController::class, 'education'])->name('education');
	Route::get('experance', [AdminController::class, 'experance'])->name('experance');
	Route::get('logOut', [AdminController::class, 'logOut'])->name('logOut');
	Route::get('gallery', [AdminController::class, 'gallery'])->name('gallery');
	Route::get('proLinks', [AdminController::class, 'proLinks'])->name('proLinks');

	Route::post('/ajaxAddPerInfo', [PersonalInfoController::class, 'ajaxAddPerInfo'])->name('ajaxAddPerInfo');
	Route::post('/ajaxUpdatePerInfo', [PersonalInfoController::class, 'ajaxUpdatePerInfo'])->name('ajaxUpdatePerInfo');

	Route::post('/addPetTitle', [ProfessionalTitleController::class, 'addPetTitle'])->name('addPetTitle');
	Route::post('/updatePetTitle', [ProfessionalTitleController::class, 'updatePetTitle'])->name('updatePetTitle');
	
	
	Route::post('/ajaxAddAboutText', [AboutController::class, 'ajaxAddAboutText'])->name('ajaxAddAboutText');
	Route::post('/ajaxUpdateAboutText', [AboutController::class, 'ajaxUpdateAboutText'])->name('ajaxUpdateAboutText');
	Route::post('/ajaxAddLanguage', [LangueseController::class, 'ajaxAddLanguage'])->name('ajaxAddLanguage');
	Route::post('/ajaxUpdateLanguage', [LangueseController::class, 'ajaxUpdateLanguage'])->name('ajaxUpdateLanguage');
	Route::get('/langfindByIdAjax/{id}', [LangueseController::class, 'langfindByIdAjax'])->name('langfindByIdAjax');
	Route::delete('ajaxDeleteLanguage/{id}', [LangueseController::class, 'ajaxDeleteLanguage'])->name('ajaxDeleteLanguage');

	Route::post('/ajaxAddProffSkill', [ProffessionalSkillsController::class, 'ajaxAddProffSkill'])->name('ajaxAddProffSkill');
	Route::get('/proffSfindByIdAjax/{id}', [ProffessionalSkillsController::class, 'proffSfindByIdAjax'])->name('proffSfindByIdAjax');

	Route::delete('ajaxDeleteProffSkill/{id}', [ProffessionalSkillsController::class, 'ajaxDeleteProffSkill'])->name('ajaxDeleteProffSkill');
	Route::post('/ajaxUpdateProffSkill', [ProffessionalSkillsController::class, 'ajaxUpdateProffSkill'])->name('ajaxUpdateProffSkill');

	Route::post('/ajaxAddProficSkill', [ProficiencySkillsController::class, 'ajaxAddProficSkill'])->name('ajaxAddProficSkill');
	Route::get('/proficSfindByIdAjax/{id}', [ProficiencySkillsController::class, 'proficSfindByIdAjax'])->name('proficSfindByIdAjax');
	Route::post('/ajaxUpdateProficSkill', [ProficiencySkillsController::class, 'ajaxUpdateProficSkill'])->name('ajaxUpdateProficSkill');
	Route::delete('ajaxDeleteProficSkill/{id}', [ProficiencySkillsController::class, 'ajaxDeleteProficSkill'])->name('ajaxDeleteProficSkill');

	Route::post('/ajaxAddPerSkill', [PersonalSkillsController::class, 'ajaxAddPerSkill'])->name('ajaxAddPerSkill');
	Route::get('/perSfindByIdAjax/{id}', [PersonalSkillsController::class, 'perSfindByIdAjax'])->name('perSfindByIdAjax');
	Route::post('/ajaxUpdatePerSkill', [PersonalSkillsController::class, 'ajaxUpdatePerSkill'])->name('ajaxUpdatePerSkill');
	Route::delete('ajaxDeletePerSkill/{id}', [PersonalSkillsController::class, 'ajaxDeletePerSkill'])->name('ajaxDeletePerSkill');

	Route::post('/ajaxAddEducation', [EducationController::class, 'ajaxAddEducation'])->name('ajaxAddEducation');
	Route::get('/edufindByIdAjax/{id}', [EducationController::class, 'edufindByIdAjax'])->name('edufindByIdAjax');
	Route::post('/ajaxUpdateEdu', [EducationController::class, 'ajaxUpdateEdu'])->name('ajaxUpdateEdu');
	Route::delete('ajaxDeleteedu/{id}', [EducationController::class, 'ajaxDeleteedu'])->name('ajaxDeleteedu');

	Route::post('/ajaxAddExperience', [ExperienceController::class, 'ajaxAddExperience'])->name('ajaxAddExperience');
	Route::get('/expfindByIdAjax/{id}', [ExperienceController::class, 'expfindByIdAjax'])->name('expfindByIdAjax');
	Route::post('/ajaxUpdateExp', [ExperienceController::class, 'ajaxUpdateExp'])->name('ajaxUpdateExp');
	Route::delete('ajaxDeleteexp/{id}', [ExperienceController::class, 'ajaxDeleteexp'])->name('ajaxDeleteexp');

	Route::post('/addGalaryImage', [GalleryController::class, 'addGalaryImage'])->name('addGalaryImage');
	Route::delete('ajaxDeleteGalleryImage/{id}', [GalleryController::class, 'ajaxDeleteGalleryImage'])->name('ajaxDeleteGalleryImage');

		Route::post('/ajaxAddProfile', [ProfileLinkesController::class, 'ajaxAddProfile'])->name('ajaxAddProfile');
	Route::delete('ajaxDeleteProfile/{id}', [ProfileLinkesController::class, 'ajaxDeleteProfile'])->name('ajaxDeleteProfile');


	
});






