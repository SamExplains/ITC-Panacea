<?php

namespace App\Http\Controllers;

use App\Demographic;
use App\MedicalInformation;
use Faker\Generator as Faker;
use Illuminate\Http\Request;

class MedicalInformationController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $store_medical = MedicalInformation::where('user_id', '=', 2)->first();
      return view('forms.medical_information._edit', ['u_medical' => $store_medical]);
    }

  /**
   * Show the form for creating a new resource.
   *
   * @param Faker $faker
   * @return \Illuminate\Http\Response
   */
    public function create(Faker $faker)
    {
        //
      $demographic_info_found = Demographic::find(\Auth::user()->id);
      return view('forms.medical_information._new',[ 'd_filled' => $demographic_info_found, 'faker' => $faker]);

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

      $validatedData = $request->validate([
        'user_id' => 'required',
        'fullname' => 'required|max:250',
        'dob' => 'required|max:60',
        'street' => 'required|max:60',
        'city' => 'required|max:60',
        'zip' => 'required|max:5',
        'state' => 'required|max:2',
        'work_phone' => 'required|max:60',
        'home_phone' => 'required|max:60',
        'e_contact_name' => 'required|max:60',
        'e_contact_phone' => 'required|max:60',
        'e_contact_relationship' => 'required|max:60',
        'hi_name' => 'required|max:60',
        'hi_id' => 'required|max:60',
        'hi_phone' => 'required|max:60',
        'hi_physician_name' => 'required|max:60',
        'hi_physician_phone' => 'required|max:60',
        'hi_physician_clinic' => 'required|max:60',
        'hi_physician_clinic_phone' => 'required|max:60',
      ]);

      $medical = (MedicalInformation::where('user_id', '=', \Auth::user()->id)->first() === null ? new MedicalInformation(): MedicalInformation::where('user_id', '=', \Auth::user()->id)->first() );
      $medical->user_id = $request->user_id;
      $medical->fullname = $request->fullname;
      $medical->dob = $request->dob;
      $medical->street = $request->street;
      $medical->city = $request->city;
      $medical->zip = $request->zip;
      $medical->state = $request->state;
      $medical->home_phone = $request->home_phone;
      $medical->work_phone = $request->work_phone;
      $medical->emergency_contact_name = $request->e_contact_name;
      $medical->emergency_contact_phone = $request->e_contact_phone;
      $medical->emergency_contact_relationship = $request->e_contact_relationship;
      $medical->health_insurance_name = $request->hi_name;
      $medical->health_insurance_id_number = $request->hi_id;
      $medical->health_insurance_phone = $request->hi_phone;
      $medical->health_insurance_physician_name = $request->hi_physician_name;
      $medical->health_insurance_physician_phone = $request->hi_physician_phone;
      $medical->health_insurance_physician_clinic = $request->hi_physician_clinic;
      $medical->health_insurance_physician_clinic_phone = $request->hi_physician_clinic_phone;
      $medical->save();

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
