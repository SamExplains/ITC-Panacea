@extends('layouts.app')
@section('content')
    @include('profile.navigation')

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-12 mx-auto">

          @if(strtolower(Auth::user()->account) === "physician")
            <div class="Comment" style="position: relative; margin-bottom: 3rem; margin-top: 3rem">
              Physicians can not leave comments!
            </div>
          @endempty

          @foreach($replies as $comment )

            <div class="Comment" style="position: relative; margin-bottom: 3rem; margin-top: 3rem">
              <a href="{{route('forum.show', $comment->forum_id)}}">Visit your comment here <i class="ui icon arrow right"></i></a>
              <p class="text-right offset-md-9 offset-6 col-md-3 col-6 Comment-User">
                <span class="font-weight-bold">{{ $comment->user_name }} | <span class="font-weight-light">{{ $comment->user_account_type }}</span></span>
                <img class="ui avatar image ml-3" src="{{ $comment->user_photo }}">
              </p>
              <p>
                {{ $comment->user_response }}
              </p>

              @if ($comment->physician_evaluation_score !== 0)

                @switch($comment->physician_evaluation_score)
                  {{-- Color coded comments --}}
                  @case(1)
                  <div class="Comment-Physician bg-danger p-1"  style="position: absolute; top: 100%; right: 0;">
                    <h6 class="ui header text-right text-white">A physician scored this post as a {{ $comment->physician_evaluation_score }}</h6>
                  </div>
                  @break

                  @case(2)
                  <div class="Comment-Physician bg-warning p-1"  style="position: absolute; top: 100%; right: 0;">
                    <h6 class="ui header text-right">A physician scored this post as a {{ $comment->physician_evaluation_score }}</h6>
                  </div>
                  @break

                  @case(3)
                  <div class="Comment-Physician bg-success p-1"  style="position: absolute; top: 100%; right: 0;">
                    <h6 class="ui header text-right text-white">A physician scored this post as a {{ $comment->physician_evaluation_score }}</h6>
                  </div>
                  @break

                @endswitch

                @else
                <div class="Comment-Physician bg-info p-1"  style="position: absolute; top: 100%; right: 0;">
                  <h6 class="ui header text-right text-white">This post has not been evaluated yet.</h6>
                </div>

              @endif


            </div>

          @endforeach

        </div>
      </div>
    </div>

@stop