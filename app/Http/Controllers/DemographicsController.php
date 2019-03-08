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
      $d_info = Demographic::find(\Auth::user()->id);
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
        'user_id' => 'required|max:60',
        'firstname' => 'required|max:60',
        'lastname' => 'required|max:60',
        'country' => 'required|max:60',
        'age' => 'required|integer|max:110',
        'gender' => 'required|max:110',
        'military_status' => 'required|max:60',
        'ethnicity' => 'required|max:60',
        'race' => 'required|max:60',
      ]);

        $demographic = new Demographic();
        $demographic->user_id = $request->user_id;
        $demographic->firstname = $request->firstname;
        $demographic->lastname = $request->lastname;
        $demographic->country = $request->country;
        $demographic->age = $request->age;
        $demographic->gender = $request->gender;
        $demographic->military_status = $request->military_status;
        $demographic->ethnicity = $request->ethnicity;
        $demographic->race = $request->race;
        $demographic->save();
//        dd($validatedData);

//      if (Demographic::Create($request->all())){
//        return true;
//      }

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
