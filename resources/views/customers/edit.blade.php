@extends('base.layout')

@section('content')
    <h1>Adicionar / Editar Cliente</h1>

    @include('base.errors')
    <div class='card'>
        <div class='card-body'>
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf()
                @method('')
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control " id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="99999999999">
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
