@extends('layout')

@section('content')
    <br>

    <h2>Detalles de la factura</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Usuario</th>
            <th scope="col">Costo</th>
            <th scope="col">Impuestos</th>
            <th scope="col">Total</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @if ($invoice)
                <tr>
                    <th scope="row">{{ $invoice->id }}</th>
                    <td>{{ $invoice->user_id }}</td>
                    <td>{{ $invoice->total_tax_free }}$</td>
                    <td>{{ $invoice->total_taxes }}%</td>
                    <td>{{ $invoice->total_cost }}$</td>
                    <td>{{ $invoice->billed ? 'Facturada' : 'Sin Facturar' }}</td>
                    @if (!$invoice->billed)
                        <td><a href="{{ route('send_invoice', [$invoice->id]) }}">Emitir factura</a></td>
                    @endif
                </tr>
            @endif
        </tbody>
      </table>

      <br>

      <h3>Detalles de los productos</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Costo</th>
            <th scope="col">Impuestos</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}$</td>
                    <td>{{ $product->tax * 100 }}%</td>
                    <td>{{ $product->price_tax }}$</td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection