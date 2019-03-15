<div class="container">
  <div class="row">
    <div class="col-12 mx-auto">
      <div class="ui top attached tabular menu">

        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/mild' ? 'active' : '')  }}" href="{{url('forum')}}"><i class="ui icon circle blue"></i> Mild</a>
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/moderate' ? 'active' : '')  }}" href="{{route('forum.moderate')}}"><i class="ui icon circle yellow"></i> Moderate</a>
        <a class="item {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/severe' ? 'active' : '')  }}" href="{{route('forum.severe')}}"><i class="ui icon circle red"></i> Severe</a>


      </div>

      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/mild' ? 'active' : '')  }}" data-tab="first">
        <p>When a physician scores users post based on their clinical response information and finalizes those scores, the post will be given an overall evaluation grade based on those scores. Evaluation grade guidelines can be found below. </p>
        <div class="mb-3">
          <p><span class="ui label">N/A </span> indicates thread has not been graded.</p>
          <p><span class="ui label">RED <i class="ui icon circle red ml-2"></i></span> indicates many of the posts in the thread are inaccurate.</p>
          <p><span class="ui label">YELLOW <i class="ui icon circle yellow ml-2"></i></span> indicates half of the posts are inaccurate.</p>
          <p><span class="ui label">GREEN <i class="ui icon circle green ml-2"></i></span> indicates majority of all posts are accurate.</p>
        </div>
        All <span class="ui label blue">Mild</span> forum content
      </div>

      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/moderate' ? 'active' : '')  }}" data-tab="second">
        <p>When a physician scores users post based on their clinical response information and finalizes those scores, the post will be given an overall evaluation grade based on those scores. Evaluation grade guidelines can be found below. </p>
        <div class="mb-3">
          <p><span class="ui label">N/A </span> indicates thread has not been graded.</p>
          <p><span class="ui label">RED <i class="ui icon circle red ml-2"></i></span> indicates many of the posts in the thread are inaccurate.</p>
          <p><span class="ui label">YELLOW <i class="ui icon circle yellow ml-2"></i></span> indicates half of the posts are inaccurate.</p>
          <p><span class="ui label">GREEN <i class="ui icon circle green ml-2"></i></span> indicates majority of all posts are accurate.</p>
        </div>
        All <span class="ui label yellow">Moderate</span> forum content
      </div>

      <div class="ui bottom attached tab segment {{ (Route::getCurrentRequest()->getRequestUri() === '/forum/severe' ? 'active' : '')  }}" data-tab="third">
        <p>When a physician scores users post based on their clinical response information and finalizes those scores, the post will be given an overall evaluation grade based on those scores. Evaluation grade guidelines can be found below. </p>
        <div class="mb-3">
          <p><span class="ui label">N/A </span> indicates thread has not been graded.</p>
          <p><span class="ui label">RED <i class="ui icon circle red ml-2"></i></span> indicates many of the posts in the thread are inaccurate.</p>
          <p><span class="ui label">YELLOW <i class="ui icon circle yellow ml-2"></i></span> indicates half of the posts are inaccurate.</p>
          <p><span class="ui label">GREEN <i class="ui icon circle green ml-2"></i></span> indicates majority of all posts are accurate.</p>
        </div>
        All <span class="ui label red">Severe</span> forum content
      </div>

    </div>
  </div>
</div>