<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function allSymptoms(){
    /*       return response('Working'); */
    return \App\Symptom::all();
  }

  public function allConditions(){
    /*       return response('Working'); */
    return \App\Condition::all();
  }


}
