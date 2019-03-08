<?php

namespace App\Http\Controllers;

use App\Demographic;
use http\Env\Response;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $demograph_exist = Demographic::find(1);
      return view('home', ['demograph' => $demograph_exist]);
    }

    public function onSymptomAndConditionForm(){
      return view('forms.conditions_and_symptoms._conditions_and_symptoms');
    }

}
