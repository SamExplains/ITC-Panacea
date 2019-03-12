@extends('layouts.app')
@section('content')
    @include('profile.navigation')

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-12 mx-auto">

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

            </div>

          @endforeach

        </div>
      </div>
    </div>

@stop