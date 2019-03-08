@extends('layouts.app')
@section('content')

  <div class="ui grid container">
    <div class="sixteen wide column">

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
      @endif

      <form action="{{route('demographic.store')}}" method="post">
        @csrf
        <div class="ui form">

          <div class="field">
            <input class="invisible" type="text" name="user_id" value="{{Auth::user()->id}}">
          </div>

          <h3 class="ui header mb-5">Edit Your Demographic Information Form</h3>
          <hr class="ui divider inverted">

          <div class="two fields">
            <div class="field required">
              <label>First name</label>
              <input class="text-primary font-weight-bold" type="text" name="firstname" placeholder="First Name" value="{{ $d_info->firstname }}">
            </div>
            <div class="field required">
              <label>Last name</label>
              <input class="text-primary font-weight-bold" type="text" name="lastname" value="{{ $d_info->lastname }}" placeholder="Last Name">
            </div>
          </div>

          <div class="three fields mt-3">

            <div class="eight wide field required">
              <label>Country</label>
              <input class="text-primary font-weight-bold" type="text" name="country" placeholder="Country" value="{{ $d_info->country }}">
            </div>
            <div class="eight wide field required">
              <label>Age</label>
              <input class="text-primary font-weight-bold" type="number" name="age" value="{{ $d_info->age }}" placeholder="Age">
            </div>
            <div class="two wide field required" >
              <label>Sex</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" {{$d_info->gender}} id="exampleRadios1" value="male" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                <label class="form-check-label" for="exampleRadios2">
                  Female
                </label>
              </div>
            </div>

          </div>

          <div class="three fields mt-3">

            <div class="field required">
              <label>Military Status</label>
              <input class="text-primary font-weight-bold" type="text" name="military_status" value="{{ $d_info->military_status }}" placeholder="Military Status">
            </div>

            <div class="field required">
              <label>Ethnicity</label>
              <input class="text-primary font-weight-bold" type="text" name="ethnicity" value="{{ $d_info->ethnicity }}" placeholder="Ethnicity">
            </div>

            <div class="field required">
              <label>Race</label>
              <input class="text-primary font-weight-bold" type="text" name="race" value="{{ $d_info->race }}" placeholder="Race">
            </div>

          </div>

          <button class="ui button orange large fluid mt-3" type="submit">Update</button>

        </div>
      </form>


    </div>
  </div>

@stop