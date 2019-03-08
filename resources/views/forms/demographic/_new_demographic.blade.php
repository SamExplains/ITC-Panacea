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

          <h3 class="ui header mb-5">Demographic Information Form</h3>
          <hr class="ui divider inverted">

          <div class="two fields">
            <div class="field required">
              <label>First name</label>
              <input type="text" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" required>
            </div>
            <div class="field required">
              <label>Last name</label>
              <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name" required>
            </div>
          </div>

          <div class="three fields mt-3">

            <div class="eight wide field required">
              <label>Country</label>
              <input type="text" name="country" placeholder="Country" value="{{ old('country') }}" required>
            </div>
            <div class="eight wide field required">
              <label>Age</label>
              <input type="number" name="age" value="{{ old('age') }}" placeholder="Age" required>
            </div>
            <div class="two wide field required" >
              <label>Sex</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" {{old('sex')}} id="exampleRadios1" value="male" checked>
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
              <input type="text" name="military_status" value="{{ old('military_stat') }}" placeholder="Military Status" required>
            </div>

            <div class="field required">
              <label>Ethnicity</label>
              <input type="text" name="ethnicity" value="{{ old('ethnicity') }}" placeholder="Ethnicity" required>
            </div>

            <div class="field required">
              <label>Race</label>
              <input type="text" name="race" value="{{ old('race') }}" placeholder="Race" required>
            </div>

          </div>

          <button class="ui button success large primary fluid mt-3" type="submit">Submit</button>

        </div>
      </form>


    </div>
  </div>

@stop