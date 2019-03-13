<?php

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

  /* https://api.infermedica.com/v2/conditions */

//  $ch = curl_init('https://api.infermedica.com/v2/symptoms');
//  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//      'Content-Type: application/json',
//      'App-Id: 7baf3c5c',
//      'App-Key: 3427e1a60c0937a3db075b86445dd7ae')
//  );

//  return json_decode(curl_exec($ch), true);

    return view('welcome');
});

Auth::routes();

/* Homepage for Admins/Patients/Physicians */
Route::get('/home', 'HomeController@index')->name('home');

/* All Symptoms */
Route::get('/all/symptoms', 'SearchController@allSymptoms');
Route::get('/all/conditions', 'SearchController@allConditions');
Route::get('/all/medication', 'SearchController@allMedicationsOther');
Route::get('/physician/user-mi/{id}', 'SearchController@physicianRequestUserMedicalInformation')->name('search.medical');

/* Great MD Forms */
/* https://app.drchrono.com/ehr-emr/medical-form-templates/ */

/* Used to display all conditions & symptoms created by user */
Route::get('profile/conditions', 'ProfileController@conditions')->name('profile.conditions');
Route::get('profile/replys', 'ProfileController@replys')->name('profile.replys');
Route::get('profile/evaluations', 'ProfileController@evaluations')->name('profile.evaluations');

/* Forum Filters */
Route::get('forum/mild', 'ForumController@mild')->name('forum.mild');
Route::get('forum/moderate', 'ForumController@moderate')->name('forum.moderate');
Route::get('forum/severe', 'ForumController@severe')->name('forum.severe');

Route::resources([
  'demographic' => 'DemographicsController',
  'condition' => 'ConditionsAndSymptomsController',
  'medical' => 'MedicalInformationController',
  'profile' => 'ProfileController',
  'forum' => 'ForumController',
  'comment' => 'CommentController',
]);