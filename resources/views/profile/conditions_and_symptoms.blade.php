@extends('layouts.app')
@section('content')

  @include('profile.navigation')

  <div class="container">
    <div class="row">

      <div class="col-md-8 col-12 mx-auto">
        @include('forum.minimal', ['highlight' => $posts])
      </div>

    </div>
  </div>

@stop