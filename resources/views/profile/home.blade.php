@extends('layouts.app')
@section('content')

  <div class="row mx-auto">

    @include('profile.navigation')

    <div class="col-md-5 mx-auto Profile">

      <div class="Profile-Background">

        @if (Auth::user()->photo === null)
          <img src="{{asset('images/profile/lion-3317670_1280.jpg')}}" class="mx-auto d-block mb-3 Profile-Photo"  alt="">
        @else
          <img src="{{ Auth::user()->photo }}" class="mx-auto d-block mb-3 Profile-Photo"  alt="">
        @endif

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
        <p>
          You are registered as a <b class="text-primary">{{ Auth::user()->account }}</b>
        </p>
      </div>

      <div>


      </div>

    </div>

  </div>

@stop