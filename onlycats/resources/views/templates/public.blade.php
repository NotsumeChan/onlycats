<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OnlyCats</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      /* Make the layout responsive and center-aligned on desktop */
      @media (min-width: 992px) {
         .row {
              display: flex;
              justify-content: center;
              align-items: center;
          }
         .right {
              max-width: 500px; /* adjust the max-width to your liking */
              margin: 0 auto;
          }
      }
  </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('/')}}">OnlyCats</a>

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('producto') }}">products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('category') }}">category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">register</a>
            </li>
          </ul>
          
        </div>
      </nav>
        @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>