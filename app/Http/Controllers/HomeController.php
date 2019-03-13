<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Demographic;
use App\Forum;
use App\MedicalInformation;
use App\PhysicianRecord;
use App\User;
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
      $p_records = PhysicianRecord::orderBy('id', 'DESC')->where('physician_user_id', '=', \Auth::user()->id)->take(3)->get();

      /* Points for charts */
      $total_points = Forum::sum('evaluation_score');
      $mild_points = Comment::where('physician_evaluation_score', '=', 1)->sum('physician_evaluation_score');
      $moderate_points = Comment::where('physician_evaluation_score', '=', 2)->sum('physician_evaluation_score');
      $severe_points = Comment::where('physician_evaluation_score', '=', 3)->sum('physician_evaluation_score');

      /* Posts count by severity type */
      $total_posts = Forum::all()->count();
      $total_mild_posts = Forum::all()->where('severity', '=', 'mild')->count();
      $total_moderate_posts = Forum::all()->where('severity', '=', 'moderate')->count();
      $total_severe_posts = Forum::all()->where('severity', '=', 'severe')->count();

      /* Total user type counts */
      $total_users = User::all()->count();
      $total_patient_users = User::all()->where('account', '=', 'patient')->count();
      $total_administrator_users = User::all()->where('account', '=', 'administrator')->count();
      $total_physician_users = User::all()->where('account', '=', 'physician')->count();

      return view('home', ['demograph' => $demograph_exist,
                      'medical' => $medical_exist,
                      'forum' => $forum_exist,
                      'highlight' => $top_forum_posts,
                      'records' => $p_records,
                      'p_total' => $total_points,
                      'p_mild_total' => $mild_points,
                      'p_moderate_total' => $moderate_points,
                      'p_severe_total' => $severe_points,
                      't_posts' => $total_posts,
                      't_mild_posts' => $total_mild_posts,
                      't_moderate_posts' => $total_moderate_posts,
                      't_severe_posts' => $total_severe_posts,
                      't_users' => $total_users,
                      't_patient_users' => $total_patient_users,
                      't_administrator_users' => $total_administrator_users,
                      't_physician_users' => $total_physician_users,
      ]);
    }

    public function onSymptomAndConditionForm(){
      return view('forms.conditions_and_symptoms._conditions_and_symptoms');
    }

}
