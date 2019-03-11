
@foreach(\App\Comment::where('forum_id', '=', $forum_item->id)->get() as $comment )


<div class="Comment" style="position: relative; margin-bottom: 6rem">

  <p class="text-right offset-md-9 offset-6 col-md-3 col-6 Comment-User">
    <span class="font-weight-bold">{{ $comment->user_name }} | <span class="font-weight-light">{{ $comment->user_account_type }}</span></span>
    <img class="ui avatar image ml-3" src="{{ $comment->user_photo }}">
  </p>
  <p>
    {{ $comment->user_response }}
  </p>

  <div class="Comment-Physician"  style="position: absolute; top: 95%; right: 0;">
    <h6 class="ui header text-right">Evaluate this comment <b class="text-primary">(Physician Only!)</b></h6>
    <div class="ui buttons right floated right aligned" id="eval">
      <button class="ui button pink" data-valuation="1" onclick="console.warn($(this).attr('data-valuation'))">1</button>
      <button class="ui button purple" data-valuation="2" onclick="console.warn($(this).attr('data-valuation'))">2</button>
      <button class="ui button violet" data-valuation="3" onclick="console.warn($(this).attr('data-valuation'))">3</button>
    </div>
  </div>
</div>

@endforeach