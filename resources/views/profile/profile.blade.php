<div class="row">
  <div class="col-12 Profile">

    <div class="Profile-Background">
      <img src="{{asset('images/profile/lion-3317670_1280.jpg')}}" class="mx-auto d-block mb-3 Profile-Photo"  alt="">

      @switch(Auth::user()->account)
        @case("patient")
          <img src="{{asset('images/user-types/basic.svg')}}" class="Profile-Type" alt="">
        @break
        @case("administrator")
          <img src="{{asset('images/user-types/admin.svg')}}" class="Profile-Type" alt="">
        @break;
        @case("physician")
          <img src="{{asset('images/user-types/physician.svg')}}" class="Profile-Type" alt="">
        @break;
      @endswitch

    </div>

    <hr>

  <div class="mt-3">
    <table class="table">
      <thead>
      <tr>
        <th>Name</th>
        <th>Desc.</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td scope="row">Recent condition & symptom</td>
        <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, libero?</a></td>
      </tr>
      <tr>
        <td scope="row">Demographic Info</td>
        <td>
          @if (Route::has('home') && $demograph !== null)
            <p><b class="font-weight-bold text-success">{{ $demograph->firstname }}, {{ $demograph->lastname }}</b></p>
            <p><b class="font-weight-bold text-success">{{ $demograph->age }} / {{ ucfirst($demograph->gender) }} / {{ ucfirst($demograph->race) }} / {{ ucfirst($demograph->ethnicity) }}</b></p>
         @else
            <p class="text-danger">No demographic information on record!</p>
         @endif

        </td>
      </tr>
      <tr>
        <td scope="row">Medical Info</td>
        @if ($medical !== null)
            <td>
              <p>D.O.B <b class="font-weight-bold text-success">{{ $medical->dob }}</b></p>
              <p>Health Insurance <b class="font-weight-bold text-success">{{ $medical->health_insurance_name }}</b></p>
              <p>Emergency Contact <b class="font-weight-bold text-success">{{ $medical->emergency_contact_name }}</b></p>
              <p>Physician <b class="font-weight-bold text-success">{{ $medical->health_insurance_physician_name }}</b></p>
            </td>
        @else
          <td>
            <p class="text-danger">No medical information on record!</p>
          </td>
        @endif
      </tr>
      </tbody>
    </table>
  </div>

  </div>
</div>