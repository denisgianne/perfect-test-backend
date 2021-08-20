@extends('base.layout')

@section('content')

    <h1>Visualizar Produto</h1>
    <div class='card'>
        <div class='card-body'>

            <h5 class='my-5'>Informações do produto</h5>

            @include('base.errors')


            <dl class="row">
                <dt class="col-sm-3">Código</dt>
                <dd class="col-sm-9">{{ $product->id }}</dd>

                <dt class="col-sm-3">Data de cadastro</dt>
                <dd class="col-sm-9">{{ $product->created_at->format('d/m/Y H\hi') }}</dd>

                @if ($product->created_at != $product->updated_at)
                    <dt class="col-sm-3">Última alteração</dt>
                    <dd class="col-sm-9">{{ $product->updated_at->format('d/m/Y H\hi') }}</dd>
                @endif

                <dt class="col-sm-3">Preço</dt>
                <dd class="col-sm-9">R$ {{ number_format($product->price, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Descrição</dt>
                <dd class="col-sm-9">{{ $product->description }}</dd>
            </dl>

        </div>
    </div>
@endsection
