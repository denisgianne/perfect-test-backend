@extends('base.layout')

@section('content')

    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form>
                <div class="form-group">
                    <label for="product">Cliente</label>
                    ..dados cliente...
                </div>

                <div class="form-group">
                    <label for="discount_type">Tipo de desconto</label>
                    <select id="discount_type" name="discount_type" class="form-control">
                        <option selected>Valor</option>
                        <option>Percentual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="discount">Desconto final da venda</label>
                    <input type="text" class="form-control" id="discount" placeholder="100,00 ou menor">
                </div>

                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="text" class="form-control single_date_picker" id="date">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control">
                        <option selected>Escolha...</option>
                        <option value="sold">Aprovado</option>
                        <option value="cancel">Cancelado</option>
                        <option value="return">Devolvido</option>
                    </select>
                </div>
                <hr />
                <h5 class='mt-5'>Produtos da venda</h5>

                <div class="form-group">
                    <label for="product">Produto</label>
                    <select id="product" class="form-control">
                        <option selected>Escolha...</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input type="text" class="form-control" id="quantity" placeholder="1 a 10">
                </div>

                <div class="form-group">
                    <label for="discount_type">Tipo de desconto</label>
                    <select id="discount_type" name="discount_type" class="form-control">
                        <option selected>Valor</option>
                        <option>Percentual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="discount">Desconto final da venda</label>
                    <input type="text" class="form-control" id="discount" placeholder="100,00 ou menor">
                </div>

                <button type="submit" class="btn btn-primary">Continuar <i class="fas fa-arrow-circle-right"></i> </button>
            </form>
        </div>
    </div>
@endsection
