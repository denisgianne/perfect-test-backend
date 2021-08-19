@extends('base.layout')

@section('content')

    <h1>Editar Venda</h1>
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

                <dt class="col-sm-3">Total</dt>
                <dd class="col-sm-9">R$ {{ number_format($sale->total, 2, ',', '.') }}</dd>
            </dl>


            <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                @csrf()
                @method('PUT')
                <div class="form-group">
                    <label for="status">Status da venda</label>
                    <select id="status" name="status" class="form-control">
                        @foreach ($status as $field => $legenda)
                            <option value="{{ $field }}" {{ $field == $sale->status ? 'selected' : '' }}>
                                {{ $legenda }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar status</button>
            </form>


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
                        <th scope="col" class="text-center">
                            Ações
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
                            <td>{{ !empty($item->discount) ? ($item->discount_type == 'percentage' ? '- R$ ' . $item->discount : $item->discount . '%') : '' }}
                            </td>
                            <td>R$ {{ number_format($item->total, 2, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('sale.products.destroy', [$sale->id, $item->id]) }}"
                                    method="post">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit" class='btn btn-danger'> <i class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>{{ $sale->products->sum('qty') }}</td>
                        <td>&nbsp;</td>
                        <td>R$ {{ number_format($sale->products->sum('total'), 2, ',', '.') }}</td>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>

            <hr />
            <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                @csrf()
                @method('PUT')



                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select id="product_id" name="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->id }} - {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="qty">Quantidade</label>
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="1 a 10">
                </div>

                <div class="form-group">
                    <label for="discount_type">Tipo de desconto</label>
                    <select id="discount_type" name="discount_type" class="form-control">
                        <option value="value" selected>Valor</option>
                        <option value="percentual">Percentual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="discount">Valor do desconto</label>
                    <input type="text" class="form-control" id="discount" name="discount" placeholder="100,00 ou menor">
                </div>

                <button type="submit" class="btn btn-primary">Adicionar produto <i class="fas fa-arrow-circle-right"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
