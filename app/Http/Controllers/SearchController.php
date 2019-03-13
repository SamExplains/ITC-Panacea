<?php

namespace App\Http\Controllers;

use App\Demographic;
use App\MedicationOther;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function allSymptoms(){
    return \App\Symptom::all();
  }

  public function allConditions(){
    return \App\Condition::all();
  }

  public function allMedicationsOther(){
    return MedicationOther::all();
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


}
