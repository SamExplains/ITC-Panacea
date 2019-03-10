@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">

    <div class="col-12 mt-3">

      <div class="ui positive message">
        <i class="close icon"></i>
        <div class="header">
          Information
        </div>
        <p class="lead">
          Please fill out this form to create a new condition for yourself. This form has 3 portions ( Conditions & Symptoms > Medications > Finalize... )
        </p>
        </div>
      </div>

    <div class="col-12">
      @if ($errors->any())
        <div class="alert alert-danger fluid mt-3">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
      @endif
    </div>

    <form class="col-12 mt-5" method="post" action="{{route('condition.store')}}">
      @csrf

      <div class="ui form">

        <h6 class="ui header bg-warning p-3">Conditions & Symptoms</h6>
        <hr>

        <div class="field">
          <div class="field">
            <label for="">Filling out the form as {{ Auth::user()->name }}</label>
            <input class="invisible" type="text" name="user_id" value="{{Auth::user()->id}}">
          </div>
        </div>

        <div class="three fields">

          <div class="field">
            <label for="">Fullname</label>
            <input class="input disabled" type="text" name="fullname" value="{{ $demographic->firstname }} , {{ $demographic->lastname }}" title="Fullname" readonly>
          </div>

          <div class="field">
            <label for="age">Age</label>
            <input class="input disabled" type="text" name="age" value="{{ $demographic->age }}" title="Age" readonly>
          </div>

          <div class="field">
            <label for="gender">Gender</label>
            <input class="input disabled" type="text" name="gender" value="{{ ucfirst($demographic->gender) }}" title="Gender" readonly>
          </div>

        </div>

        <div class="field required">
          {{-- Conditions --}}
          <label for="conditions_dd">Please search for your condition.</label>
          <select class="ui search dropdown fluid conditions_dd" id="conditions_dd" name="condition" onchange="$('#severity').val( $(this).val().split('º')[1] )">
            <option value="{{ old('condition') }}">Search Condition ...</option>
          </select>
        </div>

        <div class="field">
          <label for="severity">Severity <small class="text-danger">automatically fills based on condition selected</small></label>
          <input id="severity" class="input disabled" type="text" name="severity" value="{{ old('severity') }}" title="Severity" readonly>
        </div>

        <div class="field required">

          <label for="symptoms_dd">Please for one or multiple symptoms depending on your condition.</label>
          <select class="ui fluid search dropdown" multiple="" id="symptoms_dd" name="symptoms[]">
            <option value="{{ old('symptoms') }}">Search one or multiple symptoms</option>
          </select>

        </div>

        <h6 class="ui header bg-warning p-3">Medication</h6>
        <hr>

        <div class="field required">
          <label for="medication_desc">Please describe any medications you are current taken or have taken. Also include if they were prescribed and if you have had any negative side effects.</label>
          <textarea name="medication_desc" cols="30" rows="10" title="Medication Description">{{ $faker->realText(1000) }}</textarea>
        </div>

        <div class="field required">
          <label for="medication_other">Please describe any other kinds of medications or methods you have tried or used.</label>
          <textarea name="medication_other" cols="30" rows="10" title="Medication Other">{{ $faker->realText(1000) }}</textarea>
        </div>

        <div class="field required">
          <label for="medication_other_mult">Please select one or many additional medications tried from below.</label>
          <select class="ui fluid search dropdown" multiple="" id="medication_other_mult" name="medication_other_mult[]">
            <option value="{{ old('medication_other_mult[]') }}">Search one or multiple alternative medications</option>
            <option value="nothing">Nothing</option>
          </select>
        </div>


        <h6 class="ui header bg-warning p-3">Finalization</h6>
        <hr>

        <div class="field">
          <label for="consent">Do you agree to our <a href="#">terms of condition</a> and allowing us with sharing your information?</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="consent" id="consent" value="agree" checked>
            <label class="form-check-label" for="consent">
              Agree
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="consent" id="consent" value="disagree">
            <label class="form-check-label" for="exampleRadios2">
              Disagree
            </label>
          </div>
        </div>

        <button class="ui button small green" type="submit">Submit Condition & Symptoms</button>

      </div>


    </form>

    </div>

</div>

  <script src="{{ asset('js/production.js')  }}" type="application/javascript"></script>

@endsection
