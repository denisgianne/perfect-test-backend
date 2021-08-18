@extends('base.layout')

@section('content')
    <h1>Adicionar / Editar Produto</h1>
    @include('base.errors')

    <div class='card'>
        <div class='card-body'>
            <form action="{{ !empty($product) ? route('products.update', $product->id) : route('products.store') }}"
                method="POST">
                @csrf()
                @method( !empty($product) ? 'PUT' : 'POST')


                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control " id="name" name="name" value="{{ $product->name ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" id="description"
                        name="description">{{ $product->description ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" id="price" placeholder="100,00 ou maior" name="price"
                        value="{{ $product->price ?? '' }}" />
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
