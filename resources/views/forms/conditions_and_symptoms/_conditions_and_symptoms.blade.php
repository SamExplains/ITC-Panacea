@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam autem blanditiis deserunt eos exercitationem incidunt ipsam iste libero minus necessitatibus nostrum quasi qui quidem recusandae rem, sed vel voluptate! Voluptatem!

      <div class="col-12">
        <select class="ui search dropdown fluid" id="conditions_dd">
          <option selected>Search Symptom ...</option>
        </select>

        <script type="application/javascript">
          $('.ui.dropdown')
          .dropdown()
          ;

          /* <option value="">State</option> */
          const dropdown = $('#conditions_dd');
          const items = [];
          $.ajax({
            type : 'get',
            url: '/all/symptoms',
            success:function(data){

              data.forEach((d) => {
                items.push(`<option>${d.name.replace('"', '')} [<b class="text-primary">${ (d.children_id !== 'null') ? d.children_id : 'n/a' }</b>]</option>`);
              });

              dropdown.append(items);
            }
          });

        </script>

      {{--@if ($symptoms)--}}

        {{--@foreach($symptoms as $symptom)--}}
          {{--<p>--}}
            {{--<a href="#">--}}
              {{--{{$symptom->name}} [ {{ ($symptom->children_id === 'null' ? 'n/a' : $symptom->children_id ) }} ]--}}
            {{--</a>--}}
          {{--</p>--}}
        {{--@endforeach--}}

      {{--@endif--}}

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
