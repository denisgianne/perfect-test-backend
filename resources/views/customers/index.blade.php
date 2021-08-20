@extends('base.layout')

@section('content')
    <h1>Listagem de clientes</h1>



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
        <div class="card-footer">
            {{ $customers->links() }}
        </div>
    </div>


@endsection
