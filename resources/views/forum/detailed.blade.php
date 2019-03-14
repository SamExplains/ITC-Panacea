@extends('layouts.app')
@section('content')


  <div class="ui grid container bg-light Forum">

    <div class="sixteen wide column">

      @switch($forum_item->severity)
        @case("mild")
          <div class="row bg-dark mb-3">
            <a href="{{route('forum.mild')}}" class="text-white p-2">Back to {{ $forum_item->severity }} <i class="ui icon left arrow"></i></a>
          </div>
        @break

        @case("moderate")
          <div class="row bg-dark mb-3">
            <a href="{{route('forum.moderate')}}" class="text-white p-2">Back to {{ $forum_item->severity }} <i class="ui icon left arrow"></i></a>
          </div>
        @break

        @case("severe")
          <div class="row bg-dark mb-3">
            <a href="{{route('forum.severe')}}" class="text-white p-2">Back to {{ $forum_item->severity }} <i class="ui icon left arrow"></i></a>
          </div>
        @break

      @endswitch

      <div class="row p-3 Forum-User">
        <img class="ui avatar image my-auto" src="{{ $forum_item->u_photo }}">
        <span class="my-auto ml-3">{{ $forum_item->fullname }} <b class="text-success font-weight-bold">is a {{ $forum_item->account }}</b> with a {{ $forum_item->returnColorCodedSeverity() }} condition.</span>

        @if (strtolower(Auth::user()->account) === "physician")
          <button class="ui circular button yellow small ml-3" onclick="showUsersMedicalProfile()">
            <i class="ui icon folder"></i> Show Medical Profile
          </button>

          <div class="col-12 p-3 d-none ui form mt-3 animated fadeInUp" id="MedicalInformation">

            <h6 class="ui header bg-warning p-2">Demographic Information</h6>
            <div class="ui four fields">
              <div class="field">
                <label for="">Age</label>
                <input id="age" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Country</label>
                <input id="country" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Race</label>
                <input id="race" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Gender</label>
                <input id="gender" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
            </div>

            <h6 class="ui header bg-warning p-2">Medical Information</h6>

            <div class="ui four fields">
              <div class="field">
                <label for="">D.O.B</label>
                <input id="dob" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">State</label>
                <input id="state" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Health Insurance Name</label>
                <input id="hin" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Health Insurance Phone</label>
                <input id="hinp" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
            </div>

            <hr>

            <div class="ui four fields">
              <div class="field">
                <label for="">Physician Name</label>
                <input id="pn" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Physician Phone</label>
                <input id="pp" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Physician Clinic Name</label>
                <input id="pcn" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
              <div class="field">
                <label for="">Physician Clinic Phone</label>
                <input id="pcp" class="input disabled" type="text" name="fullname"  title="Fullname" readonly>
              </div>
            </div>

          </div>

          <script>
            function showUsersMedicalProfile() {
              console.warn('showUsersMedicalProfile');
              const mi = $('#MedicalInformation');
              mi.toggleClass('d-none');

              /* search.medical */
              $.ajax({
                method: "GET",
                url: "{{ route('search.medical', $forum_item->user_id)  }}",
                data: {_token: "{{ csrf_token() }}"},
                success: (response) => {
                  $('#age').val(response.user.age);
                  $('#country').val(response.user.country);
                  $('#race').val(response.user.race);
                  $('#gender').val(response.user.gender);

                  $('#dob').val(response.user.dob);
                  $('#state').val(response.user.state);
                  $('#hin').val(response.user.health_insurance_name);
                  $('#hinp').val(response.user.health_insurance_phone);
                  $('#pn').val(response.user.health_insurance_physician_name);
                  $('#pp').val(response.user.health_insurance_physician_phone);
                  $('#pcn').val(response.user.health_insurance_physician_clinic);
                  $('#pcp').val(response.user.health_insurance_physician_clinic_phone);
                }
              });

            }
          </script>

        @endif

      </div>

      <div class="row" style="position: absolute; right: 1rem; top: 5.25rem; opacity: .75">
        <button class="ui button green fluid mb-3">{{ $forum_item->views }} views</button>
      </div>

      <div class="row" style="position: absolute; right: 1rem; top: 9.5rem; opacity: .75">
        <button class="ui button green fluid mb-3">{{ $forum_item->evaluation_score }} out of {{ count($comments) * 3 }} MAX Score | Score</button>
        <button class="ui button red fluid mb-3">{{ $forum_item->likes }} | Likes</button>
        <button class="ui button orange fluid mb-3">{{ $forum_item->helpful }} | Helpful</button>
        <button class="ui button black fluid">{{ $forum_item->comments }} | Comments</button>
      </div>

      <h2 class="ui header">{{ $forum_item->trimmedConditionName() }}</h2>
      <hr>
      <h6 class="ui header bg-warning p-2">Symptoms</h6>
      <p class="Forum-Symptoms p-2">
        @foreach(unserialize($forum_item->symptoms) as $symptom)
          <em>{{ $symptom }}</em> <br>
        @endforeach
      </p>
      {{-- Symptoms Label Group --}}

      <h6 class="ui header bg-warning p-2">Medication</h6>
      <div class="p-2">
        <h6 class="ui header bg-info p-2">Medication Description</h6>
        <p class="lead">{{ $forum_item->medication_desc }}</p>
        <h6 class="ui header bg-info p-2">Medication Description Other</h6>
        <p class="lead">{{ $forum_item->medication_other }}</p>
        <h6 class="ui header bg-info p-2">Additional Medication Treatments</h6>
        @foreach(unserialize($forum_item->medication_other_mult) as $m_o)
          <em class="font-weight-bold">{{ $m_o }}</em> <br>
        @endforeach
      </div>

      <h6 class="ui header bg-warning p-2">Comments</h6>

      {{-- Comments --}}
      @include('comment.comment' , ['forum_id' => $forum_item->id])

      <hr>

      @if (Auth::user()->account !== "physician")
        <h6 class="ui header">Write a reply to {{ $forum_item->fullname }}</h6>
        @include('comment._reply')
      @endif

    </div>

  </div>

@stop