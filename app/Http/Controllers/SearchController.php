<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

  public function allSymptoms(){
    /*       return response('Working'); */
    return \App\Symptom::all();
  }
}
