<div class="container">
  @isset($highlight)
    @foreach($highlight as $h)
      <div class="row bg-warning p-4 mt-3">

        <div class="col-2 my-auto">
          <img src="{{ $h->u_photo }}" class="ui image tiny img-responsive" style="object-fit: cover; object-position: center; border-radius: 25rem; width: 100% !important; height: 7rem !important;"  alt="">
        </div>

        <div class="col-10">
          <div>
            @switch($h->severity)
              @case("mild")
                <h3 class="ui header">{{ explode('º', $h->condition)[0] }} | <span class="ui label violet p-2"> <i class="ui icon circle blue"></i> {{$h->severity}}</span> </h3>
              @break

              @case("moderate")
                <h3 class="ui header">{{ explode('º', $h->condition)[0] }} | <span class="ui label violet p-2"> <i class="ui icon circle yellow"></i> {{$h->severity}}</span> </h3>
              @break

              @case("severe")
              <h3 class="ui header">{{ explode('º', $h->condition)[0] }} | <span class="ui label violet p-2"> <i class="ui icon circle red"></i> {{$h->severity}}</span> </h3>
              @break
            @endswitch
            {{ $h->medication_desc }}
          </div>
          <a href="{{route('forum.show', $h->id)}}" class="right aligned float-right"> <span>Total Views {{ $h->views }}</span> | View Post <i class="ui icon arrow right"></i></a>
        </div>

      </div>
    @endforeach

  @endif
</div>