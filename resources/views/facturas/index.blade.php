@extends('layout')

@section('content')
    <h1>Facturas</h1>

    <br>
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
            @foreach ($invoices as $invoice)
                <tr>
                    <th scope="row">{{ $invoice->id }}</th>
                    <td>{{ $invoice->user_id }}</td>
                    <td>{{ $invoice->total_tax_free }}$</td>
                    <td>{{ $invoice->total_taxes }}$</td>
                    <td>{{ $invoice->total_cost }}$</td>
                    <td>{{ $invoice->billed ? 'Facturada' : 'Sin Facturar' }}</td>
                    <td><a href="{{ route('details', [$invoice->id]) }}">Detalles</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection