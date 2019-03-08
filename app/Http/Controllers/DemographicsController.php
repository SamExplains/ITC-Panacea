<?php

namespace App\Http\Controllers;

use App\Demographic;
use App\User;
use Illuminate\Http\Request;

class DemographicsController extends Controller
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
        //
//      $d_info = Demographic::find(\Auth::user()->id);
      $d_info = Demographic::where('user_id', '=', \Auth::user()->id)->first();
      return view('forms.demographic._edit', compact('d_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      return view('forms.demographic._new_demographic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $validatedData = $request->validate([
        'user_id' => 'required',
        'firstname' => 'required|max:60',
        'lastname' => 'required|max:60',
        'country' => 'required|max:60',
        'age' => 'required|integer|max:110',
        'gender' => 'required|max:110',
        'military_status' => 'required|max:60',
        'ethnicity' => 'required|max:60',
        'race' => 'required|max:60',
      ]);

      $stored = ( Demographic::where('user_id', '=', \Auth::user()->id)->first() === null ? new Demographic(): Demographic::where('user_id', '=', \Auth::user()->id)->first() );

      $stored->user_id = $request->user_id;
      $stored->firstname = $request->firstname;
      $stored->lastname = $request->lastname;
      $stored->country = $request->country;
      $stored->age = $request->age;
      $stored->gender = $request->gender;
      $stored->military_status = $request->military_status;
      $stored->ethnicity = $request->ethnicity;
      $stored->race = $request->race;
      $stored->save();

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
      /* domain/demographic/{$anything}/edit */
      return response(User::find($id));

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
      /* domain/demographic/{$anything}/edit */
      return response('Hello from edit');
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
