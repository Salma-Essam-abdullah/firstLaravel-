<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

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
            h1{
                font-size: 50px;
                text-align: center;
                padding: 50px
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="nav-link" aria-current="page" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">                {{ $properties['native'] }}
                    </a>
                  </li>
                    @endforeach

                </ul>
              </div>
            </div>
          </nav>
        <div class="container">
       <h1>Create new offer</h1>
       @if(Session::has('success'))
       <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
       </div>
         @endif


        <form method="POST" action="{{route('offers.store')}}">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Offer Name</label>
              <input type="text" class="form-control" id="name"  name="name" >
              @error('name')
                <small class="form-text text-danger">{{ $message }}
             @enderror
            </div>


            <div class="mb-3">
                <label for="price" class="form-label">Offer Price</label>
                <input type="number" class="form-control" id="price"  name="price" >
                @error('price')
                <small class="form-text text-danger">{{ $message }}
                 @enderror
            </div>


            <div class="mb-3">
                <label for="details" class="form-label">Offer Details</label>
                <input type="text" class="form-control" id="details"  name="details" >
                @error('details')
                <small class="form-text text-danger">{{ $message }}
                @enderror
            </div>




            <button type="submit" class="btn btn-primary">Add Offer</button>
          </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
