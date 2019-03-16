@extends('layouts.app')

@section('content')
  {{-- {{ Auth::id() }} USER ID --}}
  {{-- {{ Auth::user()->email }} USER Email --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Dashboard <span class="float-right">You are a <b class="text-primary">{{Auth::user()->account}}</b> </span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--You are logged in!--}}

                    <div class="row">
                      <div class="col-md-6">
                        @if (strtolower(Auth::user()->account) !== "physician")

                          <h5 class="ui header font-weight-bold">Conditions & Symptoms</h5>

                            @if ($demograph === null && $medical === null && Auth::user()->account === "patient")
                              <div class="bg-light p-3">
                                <img src="{{asset('images/defaults/caution.svg')}}" class="ui image mini centered mb-3" alt="">
                                <h6 class="ui header">Notification</h6>
                                <p>
                                  You must complete your <a href="{{route('demographic.create')}}">Demographic</a> and <a href="{{route('medical.create')}}">Medical Information</a>
                                  before being qualified to make a post as a patient!
                                </p>
                              </div>
                            @else

                              @switch(Auth::user()->account)

                                @case("patient")

                                @if ($forum !== null)

                                  <div class="col-12 mx-auto mb-5  universal-box-shadow  animated slideInDown">

                                    <div class="row Feed ">
                                      <div class="col-md-2 col-12">
                                        <img src="{{Auth::user()->photo}}" class="ui image mini Feed-Image" style="" alt="">
                                      </div>
                                      <div class="col-md-10 col-12">
                                        <details class="mb-3">

                                          <table class="table">
                                            <thead>
                                            <tr>
                                              <th>Name</th>
                                              <th>Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                              <td>Severity</td>
                                              <td class="text-danger">{{ $forum->severity }}</td>
                                            </tr>
                                            <tr>
                                              <td>Symptoms Described</td>
                                              <td>

                                                @foreach(unserialize($forum->symptoms) as $s)
                                                  <span class="text-primary">{{ $s }}</span><br>
                                                @endforeach

                                              </td>
                                            </tr>
                                            <tr>
                                              <td>Other Medications</td>
                                              <td>

                                                @foreach(unserialize($forum->medication_other_mult) as $m_o)
                                                  <span class="text-primary">{{ $m_o }}</span> <br>
                                                @endforeach

                                              </td>
                                            </tr>
                                            </tbody>
                                          </table>
                                          <summary class="bg-warning p-3">
                                            <b>{{ mb_ereg_replace('º', '', $forum->condition ) }} by <a href="#">{{ $forum->fullname }}</a></b>
                                          </summary>

                                        </details>

                                        <a href="{{route('forum.show', $forum->id)}}">View my latest post <i class="ui icon arrow right"></i></a>

                                      </div>
                                    </div>

                                  </div>

                                  <a href="{{route('condition.index')}}" class="d-block">New conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                                  <a href="#" class="d-block">Your conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                                  <a href="#" class="d-block">Edit conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                                  <a href="#" class="d-block">Delete conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                                @else
                                  <a href="{{route('condition.index')}}" class="d-block">New conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                                @endif

                                @break

                                @case("administrator")

                                  <div class="Comment">
                                    Admins are not allowed to create a new condition or symptom!
                                  </div>

                                @break

                                @case("physician")
                                Hello Physician!
                                @break

                              @endswitch

                            @endif

                          <p class="mt-3">
                            Here you can manage your existing conditions & symptoms or simply create new conditions & symptoms that you may have.
                          </p>

                        @else
                          <h5 class="ui header font-weight-bold">Physician Evaluation Latest</h5>

                          @if (count($records) === 0)
                            You have not evaluated any patients replys.
                          @else
                            @foreach($records as $r)
                              <div class="Comment" style="position: relative; margin-bottom: 1rem; margin-top: 1rem">
                                <p>You gave this user response a evaluation score of <b class="bg-success p-1">{{ $r->physician_evaluation_score }}</b> <a class="float-right" href="{{route('forum.show', $r->forum_id )}}">View this post <i class="ui icon arrow right"></i></a></p>
                              </div>
                            @endforeach
                          @endif

                        @endif

                      </div>

                      <div class="col-md-6">
                        <h5 class="ui header font-weight-bold">Demographic Information</h5>
                        @if ($demograph !== null)
                          <div class="Demographic bg-light p-3">
                            <h6 class="ui header">Last updated at {{$demograph->created_at}}</h6>
                            <p class="font-weight-light">Registered as {{ $demograph->lastname }}, {{ $demograph->firstname }} </p>
                            <a href="{{route('demographic.index')}}" class="d-block">Update demographic information<i class="ml-3 ui arrow right icon"></i></a>
                          </div>
                        @else
                          <a href="{{route('demographic.create')}}" class="d-block">New demographic information<i class="ml-3 ui arrow right icon"></i></a>

                          <p class="mt-5">
                            Please take your time filling out the demographic questionaire to help us gauge and create a better experience for you.
                          </p>
                        @endif

                      </div>

                      <div class="col-md-4 mt-3">
                        {{--<h5 class="ui header font-weight-bold">Your questions asked</h5>--}}
                        <h5 class="ui header font-weight-bold">Points Breakdown by Severity</h5>
                        @include('profile.forum-points-severity-chart')
                      </div>

                      <div class="col-md-4 mt-3">
                        {{--<h5 class="ui header font-weight-bold">Responses recieved per question & points & physician scores!</h5>--}}
                        <h5 class="ui header font-weight-bold">Forum Breakdown</h5>
                        @include('profile.categories-chart')
                      </div>

                      <div class="col-md-4 mt-3">
                        {{--<h5 class="ui header font-weight-bold">Popular Questions</h5>--}}
                        <h5 class="ui header font-weight-bold">Registration Breakdown</h5>
                        @include('profile.registration-chart')
                      </div>

                      <div class="col-md-8 mt-3">
                        <h5 class="ui header font-weight-bold">Medical Information</h5>

                        @if ($medical !== null)
                          <div class="row p-3 bg-light">
                            <div class="col-md-1 col-2">
                              <img src="{{asset('images/defaults/checkmark_gr.svg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-11 col-10 my-auto">
                              <h6 class="ui header">Last updated at {{$medical->updated_at}}</h6>
                              <p>Filled out under <b class="text-primary">{{$medical->fullname}}</b></p>
                              <p>Health Insurer <b class="text-danger">{{$medical->health_insurance_name}}</b>, Plan ID <b class="text-danger">{{ $medical->health_insurance_id_number }}</b></p>

                            </div>
                            <div class="col-12 mt-3">
                              <a href="{{route('medical.index')}}" class="d-block">Update your medical information <i class="ml-3 ui arrow right icon"></i></a>
                            </div>

                          </div>
                        @else
                          <a href="{{route('medical.create')}}" class="d-block">New medical information <i class="ml-3 ui arrow right icon"></i></a>
                        @endif
                        <p class="mt-3">Here you can see a broad overview of your medical information in a informative and educational way.</p>
                        <p class="mt-3">Medical panel instruments like in the photo!</p>

                        <hr>

                        <h5 class="ui header font-weight-bold">Forum</h5>
                        <p class="font-weight-light">The <b>Forum</b> is divided into <u>3 broad categories which are <span class="bg-warning p-2 font-weight-bold"> Mild, Moderate, Severe )</span></u></p>

                        <h6 class="ui header">Popular Forum Conditions & Symptoms</h6>
                        @include('forum.minimal')

                      </div>

                      <div class="col-md-4 col-12 mt-3">
                        <h5 class="ui header font-weight-bold">{{ Auth::user()->name }}'s Profile</h5>
                        @include('profile.profile')

                        <div class="ui animated button green small fluid" onclick="window.location = '{{route('profile.index')}}'" tabindex="0">
                          <div class="visible content">View</div>
                          <div class="hidden content">
                            <i class="right arrow icon"></i>
                          </div>
                        </div>

                        <p class="mt-3">View your profile settings and forums you participated in.</p>
                      </div>

                      </div>

                    </div>

                </div>
            </div>
        </div>
  </div>
@endsection
