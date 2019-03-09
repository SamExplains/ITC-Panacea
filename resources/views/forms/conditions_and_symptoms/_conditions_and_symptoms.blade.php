@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam autem blanditiis deserunt eos exercitationem incidunt ipsam iste libero minus necessitatibus nostrum quasi qui quidem recusandae rem, sed vel voluptate! Voluptatem!

      <div class="col-12 mt-5">
        {{-- Conditions --}}
        <select class="ui search dropdown fluid conditions_dd" id="conditions_dd" name="condition">
          <option selected>Search Condition ...</option>
        </select>

        <script type="application/javascript">
          $('.ui.dropdown.conditions_dd')
          .dropdown()
          ;

          /* <option value="">State</option> */
          const dropdown = $('#conditions_dd');
          const items = [];
          $.ajax({
            type : 'get',
            url: '/all/conditions',
            success:function(cond){

              cond.forEach((c) => {
                items.push(`<option>${c.name.replace(/['"]+/g, '')} <b class="text-primary"> ..... ${ c.extras_hint.replace(/['"]+/g, '') }</b></option>`);
              });

              dropdown.append(items);
            }
          });

        </script>

    </div>

    <div class="col-12 mt-5">

      <select class="ui fluid search dropdown" multiple="" id="symptoms_dd">
        <option value="">Select one or multiple symptoms</option>
      </select>

      {{-- Symptoms --}}
      <script type="application/javascript">
        $('.ui.fluid.search.dropdown')
        .search()
        .dropdown()
        ;

        const s_dropdown = $('#symptoms_dd');
        const s_items = [];
        $.ajax({
          type : 'get',
          url: '/all/symptoms',
          success:function(symp){
            symp.forEach((s) => {
              s_dropdown.append(`<option>${s.common_name.replace(/['"]+/g, '')} ..... ${s.name.replace(/['"]+/g, '')}</option>`);
            });
            s_dropdown.append(items);
          }
        });

      </script>

    </div>

  </div>
</div>

    <script type="application/javascript">
      {{--let data = [];--}}
      {{--@foreach($symptoms as $symptom)--}}

      {{--data.push({title: "{{$symptom->name}}"});--}}

      {{--@endforeach--}}

      // console.warn(data);
    </script>

@endsection
