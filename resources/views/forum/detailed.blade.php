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
      <div class="">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, eum.
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
            <button class="ui blue labeled submit icon button right floated" name="Add_Reply">
              <i class="icon edit"></i> Add Reply
            </button>
          </div>
        </div>
      </form>

    </div>

  </div>

@stop