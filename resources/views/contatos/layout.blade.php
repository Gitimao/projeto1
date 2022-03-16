<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>CRUD Laravel - Giovanni Marin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">
    </head>
    <body>
    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <h1>CRUD Laravel - Giovanni Marin</h1>
            </div>
            <div class="col-lg-6">
                @If(Request::path() != 'login')
                @if ($logado == true)
                    <a href="/logoff" class="btn btn-danger"><i class="fa-solid fa-power-off"></i></a>
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    
    </body>
</html>