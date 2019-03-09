<div class="container"> {{--  profile.replys --}}
  <div class="row">
    <div class="col-md-8 col-12 mx-auto">
      <div class="ui top attached tabular menu">
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile' ? 'active' : '')  }}" href="{{url('profile')}}">Profile</a>
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/conditions' ? 'active' : '')  }}" href="{{route('profile.conditions')}}">Conditions & Symptoms</a>
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/profile/replys' ? 'active' : '')  }}" href="{{route('profile.replys')}}">Replys</a>
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
    </div>
  </div>
</div>

<script>
  $('.menu .item')
  .tab()
  ;
</script>