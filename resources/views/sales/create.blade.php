@extends('base.layout')

@section('content')

    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ route('sales.store') }}" method="POST">
                @csrf()
                <h5 class='mt-5'>Informações da venda</h5>
                @include('base.errors')


                <div class="form-group">
                    <label for="product">Cliente</label>
                    <select id="products" name="customer_id" class="form-control">
                        <option value="" selected>Escolha...</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="text" class="form-control single_date_picker" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        @foreach ($status_list as $field => $legenda)
                            <option value="{{ $field }}">
                                {{ $legenda }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <hr />

                <button type="submit" class="btn btn-primary">Adicionar produtos <i class="fas fa-arrow-circle-right"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
