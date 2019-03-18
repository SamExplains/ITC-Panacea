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
              <div class="title m-b-md bg-warning">
                <img src="{{asset('images/Favicons (panacea)/favicon-60.png')}}" alt="">Panacea
              </div>

              <div class="col-12 mx-auto">
                <div class="Comment mt-4 lead">
                  <h4 class="ui header">In order to start you are required to create and account. If you already have an account you can start exploring our forum.</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci cumque facilis maiores
                    perspiciatis temporibus. Adipisci aliquam aliquid amet assumenda cupiditate dicta enim, eveniet id
                    ipsam iste maxime modi necessitatibus nihil obcaecati quae quibusdam quod ratione repellendus, sint
                    temporibus ullam voluptate voluptatibus. Ad alias eos illo laborum libero maxime nisi nobis nostrum,
                    optio perferendis placeat quae, quam quo, repudiandae sequi. Ab accusantium ad animi architecto
                    assumenda atque aut consectetur, culpa delectus doloremque, exercitationem iste nemo odio omnis quas
                    rerum tenetur velit veniam! Adipisci delectus dolore ducimus ea, enim harum minima nam odit quas
                    ratione, rem, voluptatibus! Esse, fuga in incidunt nostrum quaerat velit voluptatibus. Alias animi
                    distinctio fugiat modi. Dolor eveniet harum impedit in itaque molestiae suscipit tenetur unde!
                    Asperiores delectus dignissimos esse et ipsa laboriosam, molestias mollitia non praesentium quasi
                    quibusdam quos, sunt unde ut voluptatibus. At, eligendi est eum impedit iure non nulla quasi,
                    repellat tempore unde voluptatem.</p>
                </div>
              </div>

              <div class="col-12 mx-auto">
                <div class="Comment mt-4 lead">

                  @include('profile.topPhysician', ['tpd' => $topPhysiciansData])

                </div>
              </div>

              <div class="col-12 mt-4">
                <div class="row">
                  <div class="col-4 bg-warning p-4">
                    <h5 class="ui header">Create your own personalized medical conditions.</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci error est facere magni
                      necessitatibus nostrum placeat porro, qui, quis, rerum sit voluptate voluptatum? Architecto
                      ducimus eos ex nam nihil quidem repellat, similique ut voluptate. Aliquid consequuntur debitis
                      deleniti deserunt ex nulla perferendis provident repellat ut vel! Doloremque iure iusto nemo
                      nesciunt. A, accusamus adipisci dicta dolorem eaque, est, harum incidunt inventore ipsum iusto
                      molestiae officia quo quos rem repudiandae saepe sequi temporibus tenetur unde voluptate.</p>
                  </div>
                  <div class="col-4 bg-warning p-4">
                    <h5 class="ui header">Explore conditions and learn about patients.</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci error est facere magni
                      necessitatibus nostrum placeat porro, qui, quis, rerum sit voluptate voluptatum? Architecto
                      ducimus eos ex nam nihil quidem repellat, similique ut voluptate. Aliquid consequuntur debitis
                      deleniti deserunt ex nulla perferendis provident repellat ut vel! Doloremque iure iusto nemo
                      nesciunt. A, accusamus adipisci dicta dolorem eaque, est, harum incidunt inventore ipsum iusto
                      molestiae officia quo quos rem repudiandae saepe sequi temporibus tenetur unde voluptate.</p>
                  </div>
                  <div class="col-4 bg-warning p-4">
                    <h5 class="ui header">Take advantage of our expert physicians</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci error est facere magni
                      necessitatibus nostrum placeat porro, qui, quis, rerum sit voluptate voluptatum? Architecto
                      ducimus eos ex nam nihil quidem repellat, similique ut voluptate. Aliquid consequuntur debitis
                      deleniti deserunt ex nulla perferendis provident repellat ut vel! Doloremque iure iusto nemo
                      nesciunt. A, accusamus adipisci dicta dolorem eaque, est, harum incidunt inventore ipsum iusto
                      molestiae officia quo quos rem repudiandae saepe sequi temporibus tenetur unde voluptate.</p>
                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>
    </body>
</html>

