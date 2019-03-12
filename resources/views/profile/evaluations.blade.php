@extends('layouts.app')
@section('content')
    @include('profile.navigation')

    <div class="container">
      <div class="row">

        <div class="col-md-8 col-12 mx-auto">

          @if (isset($records))

            @foreach($records as $r)
              <div class="Comment" style="position: relative; margin-bottom: 3rem; margin-top: 3rem">
                <p>You gave this user response a evaluation score of {{ $r->physician_evaluation_score }} <a class="float-right" href="{{route('forum.show', $r->forum_id )}}">View this post <i class="ui icon arrow right"></i></a></p>
              </div>
            @endforeach

          @else
            <div class="Comment" style="position: relative; margin-bottom: 3rem; margin-top: 3rem">
              You evaluations content here...
            </div>
          @endif

        </div>

      </div>
    </div>


@stop