@extends('layouts.app')
@section('content')
  @include('profile.navigation')

  <div class="container">
    <div class="row" id="Threads">

      @isset($threads)

        @foreach($threads as $t)
          <div class="col-md-8 col-12 mx-auto" data-thread="{{$t->id}}" id="Thread-{{ $t->id }}">

            <div class="row m-2 Comment">
              <div class="col-2">
                <img src="{{ $t->u_photo }}" class="ui image mini circular" alt="">
              </div>
              <div class="col-10 my-auto">
                <h6 class="ui header">{{ $t->trimmedConditionName() }}</h6>
                <p>{{ $t->medication_desc }}</p>
              </div>
              <div class="col-12">
                <button class="ui red button text-white fluid mt-3" style="border-radius: 0" onclick="deleteThread($(this).parents().eq(2).attr('id'), $(this).parents().eq(2).attr('data-thread'))">Delete</button>
              </div>

            </div>

          </div>
        @endforeach

          <script>
            function deleteThread(_t_container, _t_id) {
              console.warn(`Container ${_t_container}`);
              console.warn(`Thread ID ${_t_id}`);

              $.ajax({
                url: "{{ route('forum.destroy', 1) }}",
                data: {_token: "{{ csrf_token() }}", id: _t_id},
                type: 'DELETE',
                success: function(result) {
                  // Do something with the result
                  console.warn(result);
                  const _success_template = `<div class="col-md-8 col-12 mx-auto text-center mx-auto animated fadeIn mt-3">
                                            <div class="Comment">
                                              <img src="{{asset('images/defaults/checkmark_gr.svg')}}" class="ui image mini centered" alt="">
                                              Thread Deleted
                                            </div>
                                        </div>`;
                  $('#'+_t_container).replaceWith(_success_template);
                }
              });

            }
          </script>

      @endisset

    </div>
  </div>

@endsection