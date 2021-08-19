@extends('base.layout')

@section('content')
    <h1>Listagem de produtos</h1>



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
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col" colspan="2" class="text-center">
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

                            <a href='{{ route('products.edit', $product->id) }}' class='btn btn-primary'> <i
                                    class="fas fa-pencil-alt"></i> </a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
            {{ $products->links() }}
        </div>
    </div>


@endsection