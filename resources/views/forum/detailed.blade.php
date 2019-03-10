@extends('layouts.app')
@section('content')


  <div class="ui grid container bg-light Forum">

    <div class="sixteen wide column" style="position: relative">

      <div class="row p-3 Forum-User">
        <img class="ui avatar image my-auto" src="{{ $forum_item->u_photo }}">
        <span class="my-auto ml-3">{{ $forum_item->fullname }} <b class="text-success font-weight-bold">is a {{ $forum_item->account }}</b> with a {{ $forum_item->returnColorCodedSeverity() }} condition.</span>
      </div>

      <div class="row" style="position: absolute; right: 1rem; top: 2rem; opacity: .75">
        <button class="ui button green fluid mb-3">{{ $forum_item->views }} views</button>
      </div>

      <div class="row" style="position: absolute; right: 1rem; top: 6rem; opacity: .75">
        <button class="ui button green fluid mb-3">{{ $forum_item->evaluation_score }} / Score</button>
        <button class="ui button red fluid mb-3">{{ $forum_item->likes }}</button>
        <button class="ui button orange fluid">{{ $forum_item->helpful }}</button>
      </div>

      <h2 class="ui header">{{ $forum_item->trimmedConditionName() }}</h2>
      <hr>
      <h6 class="ui header bg-warning p-2">Symptoms</h6>
      <p class="Forum-Symptoms p-2">
        @foreach(unserialize($forum_item->symptoms) as $symptom)
          <em>{{ $symptom }}</em> <br>
        @endforeach
      </p>
      {{-- Symptoms Label Group --}}

      <h6 class="ui header bg-warning p-2">Medication</h6>
      <div class="p-2">
        <h6 class="ui header bg-info p-2">Medication Description</h6>
        <p>{{ $forum_item->medication_desc }}</p>
        <h6 class="ui header bg-info p-2">Medication Description Other</h6>
        <p>{{ $forum_item->medication_other }}</p>
        <h6 class="ui header bg-info p-2">Additional Medication Treatments</h6>
        @foreach(unserialize($forum_item->medication_other_mult) as $m_o)
          <em class="font-weight-bold">{{ $m_o }}</em> <br>
        @endforeach
      </div>

      <h6 class="ui header bg-warning p-2">Comments</h6>

      <div class="Comment" style="position: relative; margin-bottom: 6rem">

        <p class="text-right offset-md-9 offset-6 col-md-3 col-6 Comment-User">
          <span class="font-weight-bold">{{ Auth::user()->name }}</span>
          <img class="ui avatar image ml-3" src="{{ Auth::user()->photo }}">
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. A atque, dicta esse expedita harum hic ipsa ipsum
          minus neque officiis perferendis possimus quos rem soluta totam veritatis voluptatem. Blanditiis dolorum earum
          fugiat labore laborum neque rerum tempora vel veniam vero. Asperiores consequuntur, cum debitis dolorem eaque
          explicabo iusto minus modi, molestias, odit repellendus suscipit temporibus ut voluptas voluptatem. Ab
          deleniti expedita, explicabo itaque minima perspiciatis quasi ratione voluptas voluptatum! Animi beatae eius
          est officia quaerat quam sequi, veniam vitae! Aspernatur corporis dolores ea eos eveniet id, iste minus non
          quas repudiandae soluta ullam voluptatum? Asperiores delectus fugit inventore magni voluptatibus. A commodi
          deserunt distinctio dolorem eos esse ex fuga itaque labore laudantium maiores molestias, natus necessitatibus
          optio provident quaerat qui reiciendis sed sequi sit ullam veniam vitae. Ab adipisci dignissimos dolor
          molestias porro recusandae veritatis. Assumenda dolore expedita illum iste nisi non, obcaecati pariatur quis
          quos, rem reprehenderit, veritatis voluptates.
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

      <hr>

      <h6 class="ui header">Write a reply to {{ $forum_item->fullname }}</h6>
      <form action="">
        <div class="ui sixteen wide column">

          <div class="bg-info p-3 mb-3 col-3" style="border-top-right-radius: 5rem">
            <img class="ui avatar image" src="{{ Auth::user()->photo }}">
            <span class="text-white font-weight-bold">{{ Auth::user()->name }}</span>
          </div>

          <div class="ui reply form universal-box-shadow">
            <div class="field" id="replyField">
              <textarea id="responseTextArea" type="responseTextArea" placeholder="Enter response here"></textarea>
            </div>
            <button class="ui pink labeled submit icon button right floated" name="Add_Reply">
              <i class="icon edit"></i> Add Reply
            </button>
          </div>
        </div>
      </form>

    </div>

  </div>

@stop