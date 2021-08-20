@extends('base.layout')

@section('content')
    <h1>Listagem de vendas</h1>



    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Vendas
                <a href='{{ route('sales.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i
                        class='fa fa-plus'></i> Nova venda</a>
            </h5>
            <table class='table'>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Ações</th>
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
                            {{ $sale->status_label }}
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
        <div class="card-footer">
            {{ $sales->links() }}
        </div>
    </div>


@endsection
