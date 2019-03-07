@extends('layouts.app')

@section('content')
  {{-- {{ Auth::id() }} USER ID --}}
  {{-- {{ Auth::user()->email }} USER Email --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--You are logged in!--}}

                    <div class="row">
                      <div class="col-6">
                        <h5 class="ui header font-weight-bold">Conditions & Symptoms</h5>

                        <a href="#" class="d-block">Your conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                        <a href="#" class="d-block">New conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                        <a href="#" class="d-block">Edit conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>
                        <a href="#" class="d-block">Delete conditions w/ symptoms<i class="ml-3 ui arrow right icon"></i></a>

                        <p class="mt-3">
                          Here you can manage your existing conditions & symptoms or simply create new conditions & symptoms that you may have.
                        </p>
                      </div>

                      <div class="col-6">
                        <h5 class="ui header font-weight-bold">Demographic Information</h5>
                        <a href="#" class="d-block">New demographic information<i class="ml-3 ui arrow right icon"></i></a>
                        <a href="#" class="d-block">Update demographic information<i class="ml-3 ui arrow right icon"></i></a>

                        <p class="mt-5">
                          Please take your time filling out the demographic questionaire to help us gauge and create a better experience for you.
                          <a href="#">You can always update your demographic information here.</a>
                        </p>

                      </div>

                      <div class="col-3 mt-3">
                        <h5 class="ui header font-weight-bold">Your questions asked</h5>
                        Pie chart!
                      </div>

                      <div class="col-3 mt-3">
                        <h5 class="ui header font-weight-bold">Responses recieved per question & points & physician scores!</h5>
                        <p>Bar chart</p>
                      </div>

                      <div class="col-6 mt-3">
                        <h5 class="ui header font-weight-bold">Popular Questions</h5>
                        <p>Bar chart</p>
                      </div>

                      <div class="col-8 mt-3">
                        <h5 class="ui header font-weight-bold">Medical Information</h5>
                        <a href="#" class="d-block">Your stored medical information <i class="ml-3 ui arrow right icon"></i></a>
                        <a href="#" class="d-block">Update your medical information <i class="ml-3 ui arrow right icon"></i></a>

                        <p class="mt-3">Here you can see a broad overview of your medical information in a informative and educational way.</p>
                        <p class="mt-3">Medical panel instruments like in the photo!</p>
                      </div>

                      <div class="col-4 mt-3">
                        <h5 class="ui header font-weight-bold">Your Profile</h5>
                        @include('profile.profile')
                        <a href="#" class="d-block mt-3">Edit profile <i class="ml-3 ui arrow right icon"></i></a>

                        <p class="mt-3">Edit your profile settings such as photo, email among other things.</p>
                      </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
