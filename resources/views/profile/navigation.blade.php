<div class="container"> {{--  profile.replys --}}
  <div class="row">
    <div class="col-md-8 col-12 mx-auto">
      <div class="ui top attached tabular menu">
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile' ? 'active' : '')  }}" href="{{url('profile')}}">Profile</a>

        @if(strtolower(Auth::user()->account) === "patient")
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/conditions' ? 'active' : '')  }}" href="{{route('profile.conditions')}}">Conditions & Symptoms</a>
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/replys' ? 'active' : '')  }}" href="{{route('profile.replys')}}">Replys</a>
        @endif

        @if(strtolower(Auth::user()->account) === "physician")
          <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/evaluations' ? 'active' : '')  }}" href="{{route('profile.evaluations')}}">Evaluations</a>
        @endempty

        @if(strtolower(Auth::user()->account) === "administrator")
          <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/cleaning' ? 'active' : '')  }}" href="{{route('profile.cleaning')}}">Delete</a>
        @endempty

      </div>
      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/profile' ? 'active' : '')  }}" data-tab="first">
        Your profile
      </div>
      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/conditions' ? 'active' : '')  }}" data-tab="second">
        Your created conditions and symptoms
      </div>
      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/replys' ? 'active' : '')  }}" data-tab="third">
        Your replies to other users
      </div>

      @if(strtolower(Auth::user()->account) === "physician")
        <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/evaluations' ? 'active' : '')  }}" data-tab="third">
          Your evaluations to other users posts and comments
        </div>
      @endempty

      @if(strtolower(Auth::user()->account) === "administrator")
        <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/cleaning' ? 'active' : '')  }}" data-tab="third">
          A an Admnin, you can delete user threads here.
        </div>
      @endempty

    </div>
  </div>
</div>

<script>
  $('.menu .item')
  .tab()
  ;
</script>