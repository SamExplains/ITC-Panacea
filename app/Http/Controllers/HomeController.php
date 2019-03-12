<?php

namespace App\Http\Controllers;

use App\Demographic;
use App\Forum;
use App\MedicalInformation;
use App\PhysicianRecord;
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
//      $demograph_exist = Demographic::find(\Auth::user()->id);
      $demograph_exist = Demographic::where('user_id', '=', \Auth::user()->id)->first();
      $medical_exist = MedicalInformation::where('user_id', '=', \Auth::user()->id)->first();
      $forum_exist = Forum::where('user_id', '=', \Auth::user()->id)->get()->last();
      $top_forum_posts = Forum::all()->sortByDesc('comments')->take(2);
      $p_records = PhysicianRecord::where('physician_user_id', '=', \Auth::user()->id)->take(3)->get();
      return view('home', ['demograph' => $demograph_exist, 'medical' => $medical_exist, 'forum' => $forum_exist, 'highlight' => $top_forum_posts, 'records' => $p_records]);
    }

    public function onSymptomAndConditionForm(){
      return view('forms.conditions_and_symptoms._conditions_and_symptoms');
    }

}
