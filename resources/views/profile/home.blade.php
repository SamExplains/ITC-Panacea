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
        <p class="lead">Please update your profile description here if you wish too by entering a description of yourself.</p>
      </div>

      <div>

        <div class="ui form mt-3">

          <form action="">
            <div class="form-group row">
              <label for="description" class="col-form-label">Description</label>
              <textarea class="form-control" name="description" id="description" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur consequatur corporis illum laudantium natus, nihil quo vitae! A adipisci aliquid assumenda corporis cum dicta distinctio ducimus eaque enim eos eveniet exercitationem explicabo, id in inventore iste magni minima molestias natus neque nobis nostrum numquam odio odit porro quasi quod recusandae reprehenderit sapiente sed ut vero voluptas voluptatibus! Dolorem facere iusto maiores nemo nulla officiis omnis placeat provident quidem! Architecto eum expedita iusto laboriosam, nesciunt officia quae quia quibusdam recusandae sed! Accusantium consequatur, delectus deleniti deserunt harum impedit ipsum modi necessitatibus neque perferendis praesentium quis, repellat ullam ut voluptatum? Architecto consequatur dignissimos incidunt iste molestias nostrum odit placeat porro quae unde! Ad assumenda at debitis est id inventore libero mollitia non quaerat unde!</textarea>
            </div>

            <button class="ui button green float-right">Update</button>

          </form>

        </div>

      </div>

    </div>

  </div>

@stop