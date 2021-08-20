@extends('base.layout')

@section('content')

    <h1>Visualizar Venda</h1>
    <div class='card'>
        <div class='card-body'>

            <h5 class='my-5'>Informações da venda</h5>

            @include('base.errors')


            <dl class="row">
                <dt class="col-sm-3">Código</dt>
                <dd class="col-sm-9">{{ $sale->id }}</dd>

                <dt class="col-sm-3">Cliente</dt>
                <dd class="col-sm-9">{{ $sale->customer->name }}</dd>

                <dt class="col-sm-3">Data</dt>
                <dd class="col-sm-9">{{ $sale->date->format('d/m/Y') }}</dd>

                <dt class="col-sm-3">Data de cadastro</dt>
                <dd class="col-sm-9">{{ $sale->created_at->format('d/m/Y H\hi') }}</dd>

                @if ($sale->created_at != $sale->updated_at)
                    <dt class="col-sm-3">Última alteração</dt>
                    <dd class="col-sm-9">{{ $sale->updated_at->format('d/m/Y H\hi') }}</dd>
                @endif

                <dt class="col-sm-3">Total</dt>
                <dd class="col-sm-9">R$ {{ number_format($sale->total, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Status da venda</dt>
                <dd class="col-sm-9">{{ $sale->status_label }}</dd>
            </dl>

            <h5 class='my-5'>Produtos desta venda</h5>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col">
                            Produto
                        </th>
                        <th scope="col">Qtd</th>
                        <th scope="col">Preço</th>
                        <th>Desconto</th>
                        <th scope="col">
                            Total
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @php($sums = ['qty' => 0, 'total' => 0])
                    @foreach ($sale->products as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ number_format($item->product->price, 2, ',', '.') }}</td>
                            <td>
                                {{ !empty($item->discount) ? ($item->discount_type == 'value' ? '- R$ ' . $item->discount : $item->discount . '%') : '' }}
                            </td>
                            <td>R$ {{ number_format($item->total, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td>{{ $sale->products->sum('qty') }}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>R$ {{ number_format($sale->products->sum('total'), 2, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>


        </div>
    </div>
@endsection
