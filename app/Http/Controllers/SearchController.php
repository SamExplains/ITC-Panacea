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
    return \App\Symptom::all();
  }

  public function allConditions(){
    return \App\Condition::all();
  }


}
