@extends('base.layout')

@section('content')

    <h1>Visualizar Cliente</h1>
    <div class='card'>
        <div class='card-body'>

            <h5 class='my-5'>Informações do cliente</h5>

            @include('base.errors')


            <dl class="row">
                <dt class="col-sm-3">Código</dt>
                <dd class="col-sm-9">{{ $customer->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $customer->name }}</dd>

                <dt class="col-sm-3">CPF</dt>
                <dd class="col-sm-9">{{ $customer->cpf }}</dd>

                <dt class="col-sm-3">Data de cadastro</dt>
                <dd class="col-sm-9">{{ $customer->created_at->format('d/m/Y H\hi') }}</dd>

                @if ($customer->created_at != $customer->updated_at)
                    <dt class="col-sm-3">Última alteração</dt>
                    <dd class="col-sm-9">{{ $customer->updated_at->format('d/m/Y H\hi') }}</dd>
                @endif

                <dt class="col-sm-3">Total em vendas</dt>
                <dd class="col-sm-9">R$ {{ number_format($customer->sales->sum('total'), 2, ',', '.') }}</dd>
            </dl>

            <h5 class='my-5'>Vendas para este cliente</h5>

            <table class='table'>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
                @foreach ($customer->sales as $sale)
                    <tr>
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
    </div>
@endsection
