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

      <form action="{{route('medical.store')}}" method="post">
        @csrf
        <div class="ui form">

          <div class="field">
            <input class="invisible" type="text" name="user_id" value="{{Auth::user()->id}}">
          </div>

          <h3 class="ui header mb-5">New Medical Information Form</h3>
          <hr class="ui divider inverted">

          @if (is_null($d_filled))
            <div class="two fields">
              <div class="twelve wide field required">
                <label>Full name</label>
                <input type="text" name="fullname" placeholder="Full name" value="{{ $faker->name }}" required>
              </div>
              <div class="field required">
                <label>Date of birth</label>
                <input type="date" name="dob" placeholder="01/01/1900" value="{{ old('dob') }}" required>
              </div>
            </div>
          @else
            <div class="two fields">
              <div class="twelve wide field required">
                <label>First name</label>
                <input type="text" name="fullname" placeholder="Full name" value="{{ $d_filled->firstname }}, {{ $d_filled->lastname }}" required>
              </div>
              <div class="field required">
                <label>Date of birth</label>
                <input type="date" name="dob" placeholder="01/01/1900" value="{{ old('dob') }}" required>
              </div>
            </div>
          @endif

          <div class="four fields mt-3">

            <div class="seven wide field required">
              <label>Street</label>
              <input type="text" name="street" placeholder="Street" value="{{ $faker->streetName }}" required>
            </div>
            <div class="seven wide field required">
              <label>City</label>
              <input type="text" name="city" value="{{ $faker->city }}" placeholder="City" required>
            </div>
            <div class="two wide field required" >
              <label>Zip</label>
              <input type="text" name="zip" value="{{ substr($faker->postcode,0, 5) }}" placeholder="Zip" required>
            </div>
            <div class="two wide field required" >
              <label>State</label>
              <input type="text" name="state" value="{{ $faker->countryCode }}" placeholder="AA" required>
            </div>
          </div>

          <div class="two fields mt-3">

            <div class="field required">
              <label>Work Phone</label>
              <input type="tel" name="work_phone" value="{{ $faker->tollFreePhoneNumber }}" placeholder="1-(555)-555-5555" required>
            </div>

            <div class="field required">
              <label>Home Phone</label>
              <input type="tel" name="home_phone" value="{{ $faker->tollFreePhoneNumber }}" placeholder="1-(555)-555-5555" required>
            </div>

          </div>

          <div class="three fields mt-3">

            <div class="field required">
              <label>Emergency Contact Name</label>
              <input type="text" name="e_contact_name" value="{{ $faker->name }}" placeholder="John Doe" required>
            </div>

            <div class="field required">
              <label>Emergency Contact Phone</label>
              <input type="tel" name="e_contact_phone" value="{{ $faker->tollFreePhoneNumber }}" placeholder="1-(555)-555-5555" required>
            </div>

            <div class="field required">
              <label>Emergency Contact Relationship</label>
              <input type="text" name="e_contact_relationship" value="{{ old('e_contact_relationship') }}" placeholder="Relative" required>
            </div>

          </div>

          <div class="three fields mt-3">

            <div class="field required">
              <label>Health Insurance Name</label>
              <input type="text" name="hi_name" value="{{ $faker->company }} {{ $faker->companySuffix }}" placeholder="Big Medical Insurance Inc." required>
            </div>

            <div class="field required">
              <label>Health Insurance ID</label>
              <input type="text" name="hi_id" value="{{ $faker->uuid }}" placeholder="A8HED-AA63" required>
            </div>

            <div class="field required">
              <label>Health Insurance Phone</label>
              <input type="tel" name="hi_phone" value="{{ $faker->tollFreePhoneNumber }}" placeholder="1-(555)-555-5555" required>
            </div>

          </div>

          <div class="two fields mt-3">

            <div class="field required">
              <label>Health Insurance Physician Name</label>
              <input type="text" name="hi_physician_name" value="{{ $faker->name }}" placeholder="Peter Griffin" required>
            </div>

            <div class="field required">
              <label>Health Insurance Physician Phone</label>
              <input type="tel" name="hi_physician_phone" value="{{ $faker->tollFreePhoneNumber }}" placeholder="1-(555)-555-5555" required>
            </div>

            <div class="field required">
              <label>Health Insurance Physician Clinic Name</label>
              <input type="text" name="hi_physician_clinic" value="{{ $faker->company }}" placeholder="Private Clinic Inc." required>
            </div>

            <div class="field required">
              <label>Health Insurance Physician Clinic Phone</label>
              <input type="tel" name="hi_physician_clinic_phone" value="{{ $faker->tollFreePhoneNumber }}" placeholder="1-(555)-555-5555" required>
            </div>

          </div>

          <button class="ui button green large fluid mt-3" type="submit">Submit</button>

        </div>
      </form>


    </div>
  </div>

@stop