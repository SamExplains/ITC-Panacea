
@foreach($comments as $comment )


<div class="Comment" style="position: relative; margin-bottom: 6rem">

  <p class="text-right offset-md-9 offset-6 col-md-3 col-6 Comment-User">
    <span class="font-weight-bold">CommentID: {{ $comment->id }}, {{ $comment->user_name }} | <span class="font-weight-light">{{ $comment->user_account_type }}</span></span>
    <img class="ui avatar image ml-3" src="{{ $comment->user_photo }}">
  </p>
  <p>
    {{ $comment->user_response }}
  </p>

  @if (strtolower(Auth::user()->account) === "physician" )

    {{-- Check if comment has a score --}}
    @if ($comment->physician_evaluation_score !== 0)
      <div class="Comment-Physician bg-warning p-1"  style="position: absolute; top: 100%; right: 0;">
        <h6 class="ui header text-right">A physician gave this post a {{ $comment->physician_evaluation_score }}</h6>
      </div>
    @else
      <div class="Comment-Physician"  style="position: absolute; top: 95%; right: 0;">
        <h6 class="ui header text-right">Evaluate this comment <b class="text-primary">(Physician Only!)</b></h6>
        <div class="ui buttons right floated right aligned" id="eval-{{ $comment->id }}">
          <button class="ui button pink" data-valuation="{{ 1 }}" data-id="{{ $comment->id }}" onclick="rateUserComment($(this).attr('data-id'), $(this).attr('data-valuation'), $(this).parent())">1</button>
          <button class="ui button purple" data-valuation="{{ 2 }}" data-id="{{ $comment->id }}" onclick="rateUserComment($(this).attr('data-id'), $(this).attr('data-valuation'), $(this).parent())">2</button>
          <button class="ui button violet" data-valuation="{{ 3 }}" data-id="{{ $comment->id }}" onclick="rateUserComment($(this).attr('data-id'), $(this).attr('data-valuation'), $(this).parent())">3</button>
        </div>
      </div>
    @endif

  @else

    @if ($comment->physician_evaluation_score !== 0)
      <div class="Comment-Physician bg-warning p-1"  style="position: absolute; top: 100%; right: 0;">
        <h6 class="ui header text-right">A physician gave this post a {{ $comment->physician_evaluation_score }}</h6>
      </div>
    @else
      <div class="Comment-Physician bg-info p-1"  style="position: absolute; top: 100%; right: 0;">
        <h6 class="ui header text-right text-white">This post has not been evaluated yet.</h6>
      </div>
    @endif

  @endif

</div>

@endforeach

<script>

  function rateUserComment(cid, b_val, parent){
    const mutate = parent;
    switch (parseInt(b_val)) {
      case 1:
      case 2:
      case 3:
        console.log(`You clicked ID ${cid}, worth a total of ${b_val}`);
        console.log(parent);

        $.ajax({
          method: "PATCH",
          url: "{{ route('comment.update', $forum_id)  }}",
          data: {_token: "{{ csrf_token() }}", cid: cid, _score: b_val},
          success: (response) => {
            console.warn(response);
            const _voted_template = `<p class="text-right animated slideInLeft my-auto"><img src="{{asset('images/defaults/checkmark_gr.svg')}}" class="d-inline-block" style="width: 1rem !important; height: 1rem !important;" > Thank you for your validation doctor!</p>`;
            parent.replaceWith(_voted_template);
          }
        });
        break;
      default:
        console.warn('Something');
        break;
    }
  }

</script>