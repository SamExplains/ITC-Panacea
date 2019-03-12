<?php

namespace App\Http\Controllers;

use App\Condition;
use App\Demographic;
use App\Forum;
use App\MedicalInformation;
use App\Symptom;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

class ConditionsAndSymptomsController extends Controller
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
//      return response(Symptom::where('id','=', 's_342')->first());
      $stored_demographic = Demographic::where('user_id','=', \Auth::user()->id)->first();
      return view('forms.conditions_and_symptoms._conditions_and_symptoms', ['faker' => $faker, 'demographic' => $stored_demographic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'user_id' => 'required',
        'fullname' => 'required',
        'age' => 'required',
        'account' => 'required',
        'u_photo' => 'required',
        'gender' => 'required',
        'condition' => 'required',
        'severity' => 'required',
        'symptoms' => 'required',
        'medication_desc' => 'required',
        'medication_other' => 'required',
        'medication_other_mult' => 'required',
        'consent' => 'required'
      ]);

//      $store = ( Forum::where('user_id', '=', \Auth::user()->id, 'and', 'condition', '=', $request->condition)->first() === null ? new Forum(): Forum::where('user_id', '=', \Auth::user()->id)->first() );
      $store = new Forum();
      $store->user_id = $request->user_id;
      $store->fullname = $request->fullname;
      $store->age = $request->age;
      $store->account = $request->account;
      $store->u_photo = $request->u_photo;
      $store->gender = $request->gender;
      $store->condition = $request->condition;
      $store->severity = $request->severity;
      $store->symptoms = serialize($request->symptoms);
      $store->medication_desc = $request->medication_desc;
      $store->medication_other = $request->medication_other;
      $store->medication_other_mult = serialize($request->medication_other_mult);
      $store->consent = $request->consent;
//      $store->created_at = Carbon::now();
//      $store->updated_at = Carbon::now();
      $store->save();

      return redirect('home');
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
