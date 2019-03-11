{{--<form action="{{ route('comment.store') }}" method="post" >--}}
{{--@csrf--}}
<div class="ui sixteen wide column">

  <div class="bg-info p-3 mb-3 col-3" style="border-top-right-radius: 5rem">
    <img class="ui avatar image" src="{{ Auth::user()->photo }}">
    <span class="text-white font-weight-bold">{{ Auth::user()->name }}</span>
  </div>

  <div class="ui reply form universal-box-shadow">
    <div class="field" id="replyField">
      <textarea id="responseTextArea" name="replyTA" type="responseTextArea" placeholder="Enter response here">{{ old('replyTA') }}</textarea>
    </div>
    <button class="ui pink labeled submit icon button right floated" name="newComment" onclick="newComment()">
      <i class="icon edit"></i> Add Reply
    </button>
  </div>
</div>

{{--</form>--}}

<script>
  function newComment() {
    const replyAreaVal = $('#responseTextArea').val();

    if (replyAreaVal === '') {
      console.warn('reponse empty!');
      $('#responseTextArea').parent().addClass('error');
    } else {
      $('#responseTextArea').parent().removeClass('error');
      $.ajax({
        method: "POST",
        url: "{{ route('comment.store')  }}",
        data: { _token: "{{ csrf_token() }}", forumId: "{{ $forum_item->id }}",  name: "{{ Auth::user()->name  }}", uid: "{{ Auth::user()->id }}", uphoto: "{{ Auth::user()->photo }}", utype: "{{ Auth::user()->account }}" ,replyForm: replyAreaVal },
        success: (response) => {
          $('#responseTextArea').val('');
        }
      });
    }



  }
</script>