<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .radius-20{
                border-radius: 20px
            }
        </style>
    </head>
    <body>
<<<<<<< HEAD
    
=======
<<<<<<< HEAD
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
>>>>>>> 294711eb82283337406eebec0217f88805b8f426

          <div class="container p-5">
<<<<<<< HEAD
            @foreach ($pages as $item)
                @include('components.pagerow',['page'=>$item])
=======
<<<<<<< HEAD
=======
    

          <div class="container p-5">
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
            @foreach ($posts as $item)
            <div class="row bg-light justify-content-center align-items-center radius-80 mb-3 page-row " >
            <div class="col-md-6 col-12">
                <div class="d-block  caption">
                    <p class="blue-text my-1"> {{ $item['message'] }}</p>
                    <form method="post" action="index_form_reply">
                        @csrf
                    <input type="hidden" name="post_id" value="{{ $item['id'] }}">
                    <button type="submit">reply</button>
                    </form>
                </div>
            </div>
            </div>
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
            @endforeach
          </div>
       

    </body>
</html>