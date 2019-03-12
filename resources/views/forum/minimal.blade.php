<div class="container">
  @isset($highlight)
    @foreach($highlight as $h)
      <div class="row bg-warning p-4 mb-3">

        <div class="col-2 my-auto">
          <img src="{{ $h->u_photo }}" class="ui image tiny img-responsive" style="object-fit: cover; object-position: center; border-radius: 25rem; width: 100% !important; height: 7rem !important;"  alt="">
        </div>

        <div class="col-10">
          <div>
            <h3 class="ui header">{{ explode('º', $h->condition)[0] }} | <span class="ui label violet p-2">{{$h->severity}}</span> </h3>
            {{ $h->medication_desc }}
          </div>
          <a href="{{route('forum.show', $h->id)}}" class="right aligned float-right"> <span>Total Views {{ $h->views }}</span> | View Post <i class="ui icon arrow right"></i></a>
        </div>

      </div>
    @endforeach

  @endif
</div>