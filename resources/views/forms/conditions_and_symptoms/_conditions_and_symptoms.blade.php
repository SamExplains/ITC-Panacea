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

    <form class="col-12 mt-5" method="post" action="{{route('condition.store')}}">
      @csrf

      <div class="ui form">

        <h6 class="ui header bg-warning p-3">Conditions & Symptoms</h6>
        <hr>

        <div class="field">
          <label for="">Filling out the form as {{ Auth::user()->name }}</label>
          Include AGE, GENDER, FULLNAME,
        </div>

        <div class="field">
          {{-- Conditions --}}
          <label for="conditions_dd">Please search for your condition.</label>
          <hr class="ui divider">

          <select class="ui search dropdown fluid conditions_dd" id="conditions_dd" name="condition">
            <option value="{{ old('condition') }}">Search Condition ...</option>
          </select>
        </div>

        <div class="field">

          <label for="symptoms_dd">Please for one or multiple symptoms depending on your condition.</label>
          <hr class="ui divider">

          <select class="ui fluid search dropdown" multiple="" id="symptoms_dd" name="symptoms[]">
            <option value="{{ old('symptoms') }}">Select one or multiple symptoms</option>
          </select>

        </div>

        <h6 class="ui header bg-warning p-3">Medication</h6>
        <hr>

        <div class="field">
          <label for="medication_desc">Please describe any medications you are current taken or have taken. Also include if they were prescribed and if you have had any negative side effects.
            <textarea name="medication_desc" cols="30" rows="10" title="Medication Description"></textarea>
          </label>
        </div>

        <div class="field">
          <label for="medication_other">Please describe any other kinds of medications or methods you have tried or used.
            <textarea name="medication_other" cols="30" rows="10" title="Medication Other"></textarea>
          </label>
        </div>

        <div class="field">
          <label for="medication_other_mult">Please select one or many additional medications tried from below.
            <select class="ui fluid search dropdown" multiple="" id="medication_other_mult" name="medication_other_mult[]">
              <option value="{{ old('medication_other_mult[]') }}">Select one or multiple alternative medications</option>
            </select>
          </label>
        </div>


        <h6 class="ui header bg-warning p-3">Finalization</h6>
        <hr>


        <button class="ui button small green" type="submit">Submit Condition & Symptoms</button>

      </div>


    </form>

    </div>

</div>

  <script src="{{ asset('js/production.js')  }}" type="application/javascript"></script>

@endsection
