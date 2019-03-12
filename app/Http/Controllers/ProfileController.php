<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Forum;
use App\MedicalInformation;
use App\PhysicianRecord;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class ProfileController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @param Faker $faker
   * @return \Illuminate\Http\Response
   */
    public function index(Faker $faker)
    {
        //
      return view('profile.home', ['faker' => $faker]);
    }

    public function conditions(){
      $user_posts = Forum::all()->where('user_id', '=', \Auth::user()->id);
      return view('profile.conditions_and_symptoms', ['posts' => $user_posts]);
    }

    public function replys(){
      $user_comments = Comment::all()->where('user_id', '=', \Auth::user()->id);
      return view('profile.replys', ['replies' => $user_comments]);
    }

    public function evaluations() {
      $p_records = PhysicianRecord::where('physician_user_id', '=', \Auth::user()->id)->get();
      return view('profile.evaluations', ['records' => $p_records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      return view('profile._edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
