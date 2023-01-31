<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facturas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
        <div class="container">
            <a class="d-block navbar-brand" href="#">Facturas</a></li>
            <ul class="navbar-nav d-flex flex-row gap-4">
                <li class="nav-item"><a class="nav-link" href="{{ route('list_products') }}">Productos</a></li>

                @auth
                    @if (auth()->user()->admin)
                        <li class="nav-item"><a class="nav-link" href="{{ route('new_product') }}">Crear producto</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('invoices') }}">Facturas</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Cerrar Session</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('signup') }}">Crear cuenta nueva</a></li>
                @endauth
            </ul>
        </div>
    </nav>
    
    <main class="container">
        @yield('content')
    </main>
</body>
</html>