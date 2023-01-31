@extends('layout')

@section('content')

    <h1>Crear cuenta nueva</h1>
    <form action="/signup" method="post">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="Nombre">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control mb-2" id="password" name="password" placeholder="Contraseña">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Repite la contraseña">
        </div>

        <input type="submit" value="Registrarte">
    </form>

    @if ($errors->any())
        <div class="mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
