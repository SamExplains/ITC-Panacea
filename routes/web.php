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

Route::get('/home', 'HomeController@index')->name('home');

/* All Symptoms */
Route::get('/all/symptoms', 'SearchController@allSymptoms');

/* Great MD Forms */
/* https://app.drchrono.com/ehr-emr/medical-form-templates/ */
Route::resources([
  'demographic' => 'DemographicsController',
  'condition' => 'ConditionsAndSymptomsController',
  'medical' => 'MedicalInformationController'
]);