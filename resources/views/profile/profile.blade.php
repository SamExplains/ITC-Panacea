<div class="row">
  <div class="col-12 Profile">

    <div class="Profile-Background">
      <img src="{{asset('images/profile/lion-3317670_1280.jpg')}}" class="mx-auto d-block mb-3 Profile-Photo"  alt="">

      @switch(Auth::user()->account)
        @case("patient")
          <img src="{{asset('images/user-types/basic.svg')}}" class="Profile-Type" alt="">
        @break
        @case("administrator")
          <img src="{{asset('images/user-types/admin.svg')}}" class="Profile-Type" alt="">
        @break;
        @case("physician")
          <img src="{{asset('images/user-types/physician.svg')}}" class="Profile-Type" alt="">
        @break;
      @endswitch

    </div>

    <hr>

  <div class="mt-3">
    <table class="table">
      <thead>
      <tr>
        <th>Name</th>
        <th>Desc.</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td scope="row">Recent condition & symptom</td>
        <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, libero?</a></td>
      </tr>
      <tr>
        <td scope="row">Demographic Info</td>
        <td>
          <p>Lorem ipsum dolor sit amet.</p>
          <p>Consequatur mollitia quasi tenetur, und.</p>
          <p>Amet blanditiis dolorem dolores ducimu.</p>
        </td>
      </tr>
      <tr>
        <td scope="row">Medical Info</td>
        <td>
          <p>Lorem ipsum dolor sit amet.</p>
          <p>Consequatur mollitia quasi tenetur, und.</p>
          <p>Amet blanditiis dolorem dolores ducimu.</p>
        </td>
      </tr>
      </tbody>
    </table>
  </div>

  </div>
</div>