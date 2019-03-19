<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panacea | Welcome</title>

        <!-- Favicon icon link -->
        <link rel="icon" type="image/png" href="{{asset('images/Favicons (panacea)/favicon-48.png')}}"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      {{-- Chart JS & CSS --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"  type="application/javascript"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


          <div class="row">
            <div class="content">
              <div class="title m-b-md bg-warning p-4" style="margin-bottom: 8rem">
                <img src="{{asset('images/Favicons (panacea)/favicon-60.png')}}" alt="">Panacea
                <p class="lead">Your online social health platform</p>
              </div>

              {{--<div class="col-12 mx-auto">--}}
                {{--<div class="Comment mt-4 lead">--}}

                  {{--@include('profile.topPhysician', ['tpd' => $topPhysiciansData])--}}

                {{--</div>--}}
              {{--</div>--}}

              <div class="col-12 mt-5">
                <div class="row">

                  <div class="col-4" style="position: relative">
                    <img src="{{asset('images/defaults/iso_1.svg')}}" class="ui image small centered" alt="">

                    <p class="bg-primary lead p-3 text-white font-weight-bold" style="position: absolute; top: -6rem; right: 5%; border-top-left-radius: 2.5rem">I have question about my condition. 🤔</p>


                  </div>
                  <div class="col-4" style="position: relative">
                    <img src="{{asset('images/defaults/iso_2.svg')}}" class="ui image small centered" alt="">
                    <p class="bg-primary lead p-3 text-white font-weight-bold" style="position: absolute; top: -6rem; right: 5%; border-top-left-radius: 2.5rem">Where can I safely discuss my medical conditions? 😟</p>
                  </div>
                  <div class="col-4" style="position: relative">
                    <img src="{{asset('images/defaults/iso_4.svg')}}" class="ui image small centered" alt="">
                    <p class="bg-primary lead p-3 text-white font-weight-bold" style="position: absolute; top: -6rem; right: 5%; border-top-left-radius: 2.5rem">I am a licensed physician able to help you out. 👍</p>
                  </div>

                  <div class="col-12 mt-4">
                    <h2 class="ui header text-left">What <span class="p-2 bg-warning">Panacea</span> Offers</h2>

                    <div class="row">
                      <div class="col-md-6 col-12">
                        <h4 class="ui header text-left mt-5">Licensed Physicians</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, adipisci aliquid, architecto beatae
                          consectetur deserunt ducimus eligendi ex facere fuga harum incidunt ipsum magni maiores maxime
                          nemo numquam, odio omnis quisquam rem ullam ut velit voluptates. Accusamus adipisci, animi
                          assumenda et, eveniet fuga fugiat in incidunt ipsa ipsum nulla omnis optio perspiciatis quaerat
                          quisquam, quo sequi tenetur unde veritatis vero voluptas voluptates voluptatum! Commodi doloremque
                          dolores et eum id laborum, laudantium mollitia nisi perspiciatis tempora.</p>

                        <hr>

                        <h4 class="ui header text-left mt-5">Explore over a million condition and symptoms combinations</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, adipisci aliquid, architecto beatae
                          consectetur deserunt ducimus eligendi ex facere fuga harum incidunt ipsum magni maiores maxime
                          nemo numquam, odio omnis quisquam rem ullam ut velit voluptates. Accusamus adipisci, animi
                          assumenda et, eveniet fuga fugiat in incidunt ipsa ipsum nulla omnis optio perspiciatis quaerat
                          quisquam, quo sequi tenetur unde veritatis vero voluptas voluptates voluptatum! Commodi doloremque
                          dolores et eum id laborum, laudantium mollitia nisi perspiciatis tempora.</p>

                        <hr>

                        <h4 class="ui header text-left mt-5">Thread evaluation for clinical accuracy and online community safety</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, adipisci aliquid, architecto beatae
                          consectetur deserunt ducimus eligendi ex facere fuga harum incidunt ipsum magni maiores maxime
                          nemo numquam, odio omnis quisquam rem ullam ut velit voluptates. Accusamus adipisci, animi
                          assumenda et, eveniet fuga fugiat in incidunt ipsa ipsum nulla omnis optio perspiciatis quaerat
                          quisquam, quo sequi tenetur unde veritatis vero voluptas voluptates voluptatum! Commodi doloremque
                          dolores et eum id laborum, laudantium mollitia nisi perspiciatis tempora.</p>

                      </div>
                      <div class="col-md-6 col-12">
                        @include('profile.topPhysician', ['tpd' => $topPhysiciansData])
                      </div>

                    </div>


                  </div>

                </div>
              </div>

            </div>

          </div>

        </div>

    </body>
</html>


{{--
              <div class="row">

                <div class="col-6">

                  <img src="{{asset('images/defaults/iso_1.svg')}}" class="ui image small centered" alt="">

                </div>

                <div class="col-6">

                  <img src="{{asset('images/defaults/iso_2.svg')}}" class="ui image small centered" alt="">

                </div>

              </div>
--}}
