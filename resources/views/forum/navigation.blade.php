<div class="container">
  <div class="row">
    <div class="col-12 mx-auto">
      <div class="ui top attached tabular menu">

        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/mild' ? 'active' : '')  }}" href="{{url('forum')}}">Mild</a>
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/moderate' ? 'active' : '')  }}" href="{{route('forum.moderate')}}">Moderate</a>
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/severe' ? 'active' : '')  }}" href="{{route('forum.severe')}}">Severe</a>


      </div>
      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/mild' ? 'active' : '')  }}" data-tab="first">
        All <span class="ui label blue">Mild</span> forum content
      </div>
      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/moderate' ? 'active' : '')  }}" data-tab="second">
        All <span class="ui label yellow">Moderate</span> forum content
      </div>
      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/severe' ? 'active' : '')  }}" data-tab="third">
        All <span class="ui label red">Severe</span> forum content
      </div>

    </div>
  </div>
</div>