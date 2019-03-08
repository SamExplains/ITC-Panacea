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

      @if ($u_medical === null)
          <div class="ui message">
            <div class="header">
              We are sorry.
            </div>
            <p>Your information is not available at this time.</p>
            <a href="{{route('home')}}">Return home</a>
          </div>
      @else

      <form action="{{route('medical.store')}}" method="post">
        @csrf
        <div class="ui form">

          <div class="field">
            <input class="invisible" type="text" name="user_id" value="{{Auth::user()->id}}">
          </div>

          <h3 class="ui header mb-5">New Medical Information Form</h3>
          <hr class="ui divider inverted">

            <div class="two fields">
              <div class="twelve wide field required">
                <label>Full name</label>
                <input type="text" name="fullname" placeholder="Full name" value=" {{ $u_medical->fullname }} " required>
              </div>
              <div class="field required">
                <label>Date of birth</label>
                <input type="date" name="dob" placeholder="01/01/1900" value="{{ $u_medical->dob }}" required>
              </div>
            </div>

          <div class="four fields mt-3">

            <div class="seven wide field required">
              <label>Street</label>
              <input type="text" name="street" placeholder="Street" value="{{ $u_medical->street }}" required>
            </div>
            <div class="seven wide field required">
              <label>City</label>
              <input type="text" name="city" value="{{ $u_medical->city }}" placeholder="City" required>
            </div>
            <div class="two wide field required" >
              <label>Zip</label>
              <input type="text" name="zip" value="{{ $u_medical->zip }}" placeholder="Zip" required>
            </div>
            <div class="two wide field required" >
              <label>State</label>
              <input type="text" name="state" value="{{ $u_medical->state }}" placeholder="AA" required>
            </div>
          </div>

          <div class="two fields mt-3">

            <div class="field required">
              <label>Work Phone</label>
              <input type="tel" name="work_phone" value="{{ $u_medical->work_phone }}" placeholder="1-(555)-555-5555" required>
            </div>

            <div class="field required">
              <label>Home Phone</label>
              <input type="tel" name="home_phone" value="{{ $u_medical->home_phone }}" placeholder="1-(555)-555-5555" required>
            </div>

          </div>

          <div class="three fields mt-3">

            <div class="field required">
              <label>Emergency Contact Name</label>
              <input type="text" name="e_contact_name" value="{{ $u_medical->emergency_contact_name }}" placeholder="John Doe" required>
            </div>

            <div class="field required">
              <label>Emergency Contact Phone</label>
              <input type="tel" name="e_contact_phone" value="{{ $u_medical->emergency_contact_phone }}" placeholder="1-(555)-555-5555" required>
            </div>

            <div class="field required">
              <label>Emergency Contact Relationship</label>
              <input type="text" name="e_contact_relationship" value="{{ $u_medical->emergency_contact_relationship }}" placeholder="Relative" required>
            </div>

          </div>

          <div class="three fields mt-3">

            <div class="field required">
              <label>Health Insurance Name</label>
              <input type="text" name="hi_name" value="{{ $u_medical->health_insurance_name }}" placeholder="Big Medical Insurance Inc." required>
            </div>

            <div class="field required">
              <label>Health Insurance ID</label>
              <input type="text" name="hi_id" value="{{ $u_medical->health_insurance_id_number }}" placeholder="A8HED-AA63" required>
            </div>

            <div class="field required">
              <label>Health Insurance Phone</label>
              <input type="tel" name="hi_phone" value="{{ $u_medical->health_insurance_phone }}" placeholder="1-(555)-555-5555" required>
            </div>

          </div>

          <div class="two fields mt-3">

            <div class="field required">
              <label>Health Insurance Physician Name</label>
              <input type="text" name="hi_physician_name" value="{{ $u_medical->health_insurance_physician_name }}" placeholder="Peter Griffin" required>
            </div>

            <div class="field required">
              <label>Health Insurance Physician Phone</label>
              <input type="tel" name="hi_physician_phone" value="{{ $u_medical->health_insurance_physician_phone }}" placeholder="1-(555)-555-5555" required>
            </div>

            <div class="field required">
              <label>Health Insurance Physician Clinic Name</label>
              <input type="text" name="hi_physician_clinic" value="{{ $u_medical->health_insurance_physician_clinic }}" placeholder="Private Clinic Inc." required>
            </div>

            <div class="field required">
              <label>Health Insurance Physician Clinic Phone</label>
              <input type="tel" name="hi_physician_clinic_phone" value="{{ $u_medical->health_insurance_physician_clinic_phone }}" placeholder="1-(555)-555-5555" required>
            </div>

          </div>

          <button class="ui button orange large fluid mt-3" type="submit">Update</button>

        </div>
      </form>
      @endif

    </div>
  </div>


@stop