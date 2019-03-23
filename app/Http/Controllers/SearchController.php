<?php

namespace App\Http\Controllers;

use App\Demographic;
use App\Forum;
use App\MedicationOther;
use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

  public function allSymptoms(){
    return \App\Symptom::all();
  }

  public function allConditions(){
    return \App\Condition::all();
  }

  public function allMedicationsOther(){
    return MedicationOther::all();
  }

  public function physicianFinalForumEvaluation($id, Request $request) {
    $forum_info = Forum::findOrFail($id);
    $forum_info->physician_grade = $request->get('grade');
    $forum_info->save();
    return response()->json($forum_info);
  }

  public function physicianRequestUserMedicalInformation($id) {
//    $user_demo = Demographic::where('user_id', '=', $id)->first();
    $user_demo = \DB::table('users')
                  ->join('demographics', 'users.id', '=', 'demographics.user_id')
                  ->join('medical_information', 'users.id', '=', 'medical_information.user_id')
                  ->select('demographics.age', 'demographics.country', 'demographics.gender', 'demographics.race', 'medical_information.dob', 'medical_information.state', 'medical_information.health_insurance_name', 'medical_information.health_insurance_phone', 'medical_information.health_insurance_physician_name', 'medical_information.health_insurance_physician_phone', 'medical_information.health_insurance_physician_clinic', 'medical_information.health_insurance_physician_clinic_phone')
                  ->where('users.id', '=', $id)
                  ->first();
    return response()->json(['user' => $user_demo]);
  }

  public function topPhysician() {
    $top_physician = \DB::table('physician_records')
      ->select(\DB::raw('count(*) as max_evaluations, physician_user_id'))
      ->where('physician_evaluation_score', '>', 0)
      ->groupBy('physician_user_id')->take(2)->get();

    if ($top_physician->isEmpty()) {
      return null;
    } else {
      $top_physician_information = \App\User::findOrFail($top_physician[0]->physician_user_id);
      $top_physician_information->leading = $top_physician[0]->max_evaluations; /* Leading physician evaluation */
      $top_physician_information->second = $top_physician[1]->max_evaluations; /* Second physician evaluation */
//      return $top_physician_information;
      return view('welcome', ['topPhysiciansData' => $top_physician_information]);
    }

  }


}
