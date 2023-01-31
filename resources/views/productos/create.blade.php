@extends('layout')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('add_product') }}" method="post">
        @csrf
        

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto">
        </div>

        <div class="mb-3">
            <label for="price_tax" class="form-label">Precio (Impuesto Incluido)</label>
            <input type="text" class="form-control" id="price_tax" name="price_tax" placeholder="Precio (Impuesto Incluido)">
        </div>

        <div class="mb-3">
            <label for="tax" class="form-label">Impuesto (sin el simbolo de porcentaje)</label>
            <input type="text" class="form-control" id="tax" name="tax" placeholder="Ej: 15">
        </div>

        <input type="submit" value="Crear producto">
    </form>
@endsection