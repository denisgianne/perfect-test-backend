@extends('base.layout')

@section('content')
    <h1>Listagem de vendas</h1>



    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Vendas
                <a href='{{ route('sales.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i
                        class='fa fa-plus'></i> Novo produto</a>
            </h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Cliente
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col" colspan="2" class="text-center">
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

                            <a href='{{ route('sales.edit', $sale->id) }}' class='btn btn-primary'> <i
                                    class="fas fa-pencil-alt"></i> </a>
                        </td>
                        <td>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="post">
                                @csrf()
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger'> <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
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
