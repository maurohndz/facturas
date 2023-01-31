@extends('layout')

@section('content')

    @auth
        <h1>Hola, {{ auth()->user()->name }}</h1>
    @endauth

    <div class="">
        <form action="{{ route('buy') }}" method="post">
            @csrf
            <div class="row justify-content-start">
                <div class="col-7">
                    <select name="product_id" class="form-select">
                        <option value="" class="">-- Seleciona un producto --</option>
                        @foreach ($productos as $producto)
                            <option class="" value="{{ $producto->id }}" >{{ $producto->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Comprar" class="col-3">
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection