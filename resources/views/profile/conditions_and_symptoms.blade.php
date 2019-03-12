@extends('layouts.app')
@section('content')

  @include('profile.navigation')

  <div class="container">
    <div class="row">

      <div class="col-md-8 col-12 mx-auto">

        @if(strtolower(Auth::user()->account) === "physician")
          <div class="Comment" style="position: relative; margin-bottom: 3rem; margin-top: 3rem">
            Physicians can not have Forum posts!
          </div>
        @endempty

        @include('forum.minimal', ['highlight' => $posts])
      </div>

    </div>
  </div>

@stop