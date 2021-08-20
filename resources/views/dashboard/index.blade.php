@extends('base.layout')

@section('content')
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='{{ route('sales.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i
                        class='fa fa-plus'></i> Nova
                    venda</a>
            </h5>
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName">
                                <option>Clientes</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input type="text" class="form-control date_range" id="inlineFormInputGroupUsername"
                                placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Cliente
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Total
                    </th>
                    <th scope="col" class="text-center">
                        Ações
                    </th>
                </tr>
                @foreach ($sales as $sale)
                    <tr>
                        <td>
                            {{ $sale->customer->name }}
                        </td>
                        <td>
                            {{ $sale->date->format('d/m/Y') }}
                        </td>
                        <td>
                            R$ {{ number_format($sale->total, 2, ',', '.') }}
                        </td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href='{{ route('sales.show', $sale->id) }}' class='btn btn-success'>
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href='{{ route('sales.edit', $sale->id) }}' class='btn btn-primary'>
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="post">
                                        @csrf()
                                        @method('DELETE')
                                        <button type="submit" class='btn btn-danger float-none'> <i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Vendas
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                @foreach ($sales_by_status as $sale)
                    <tr>
                        <td>
                            {{ $sale->status_label }}
                        </td>
                        <td>
                            {{ $sale->qty }}
                        </td>
                        <td>
                            R$ {{ number_format($sale->total, 2, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='{{ route('products.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i
                        class='fa fa-plus'></i> Novo produto</a>
            </h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Cadastro
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col" class="text-center">
                        Ações
                    </th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->created_at->format('d/m/Y H\hi') }}
                        </td>
                        <td>
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href='{{ route('products.show', $product->id) }}' class='btn btn-success'>
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href='{{ route('products.edit', $product->id) }}' class='btn btn-primary'>
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf()
                                        @method('DELETE')
                                        <button type="submit" class='btn btn-danger'> <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Clientes
                <a href='{{ route('customers.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i
                        class='fa fa-plus'></i> Novo cliente</a>
            </h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Cliente
                    </th>
                    <th scope="col">
                        Email
                    </th>
                    <th scope="col">
                        Cadastro
                    </th>
                    <th scope="col">
                        Vendas
                    </th>
                    <th scope="col" class="text-center">
                        Ações
                    </th>
                </tr>
                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            {{ $customer->name }}
                        </td>
                        <td>
                            {{ $customer->email }}
                        </td>
                        <td>
                            {{ $customer->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-center">
                            {{ $customer->sales->count() }}
                        </td>
                        <td>

                            <div class="row">
                                <div class="col">
                                    <a href='{{ route('customers.show', $customer->id) }}' class='btn btn-success'>
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href='{{ route('customers.edit', $customer->id) }}' class='btn btn-primary'>
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                        @csrf()
                                        @method('DELETE')
                                        <button type="submit" class='btn btn-danger'> <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        // $('');
    </script>
@endsection
