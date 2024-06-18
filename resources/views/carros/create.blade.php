@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar carro</span>
            <span>
                <a href="{{ route('carro.index') }}" class="btn btn-info btn-sm ">Listar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />
        @if ($errors->any())
            <span style="color:#ff0000;">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </span>
        @endif

        <div class="card-body">

            <form action="{{ route('carro.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-12 col-sm-12">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" id="modelo" placeholder="modelo do carro"
                        value="{{ old('modelo') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="cor" class="form-label">cor</label>
                    <input type="text" name="cor" class="form-control" id="cor" placeholder="cor do carro"
                        value="{{ old('cor') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="marca" class="form-label">marca</label>
                    <input type="text" name="marca" class="form-control" id="marca" placeholder="marca do carro"
                        value="{{ old('marca') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="tipo" class="form-label">tipo</label>
                    <input type="text" name="tipo" class="form-control" id="tipo" placeholder="tipo do carro"
                        value="{{ old('tipo') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="estado_carro_id" class="form-label">Estado do carro</label>
                    <select name="estado_carro_id" id="estado_carro_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($estadoCarros as $estadoCarro)
                            <option value="{{ $estadoCarro->id }}"
                                {{ old('estado_carro_id') == $estadoCarro->id ? 'selected' : '' }}>
                                {{ $estadoCarro->nome }}</option>
                        @empty
                            <option value="">Nenhum estado do carro encontrado</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="tipo_de_avaria" class="form-label">Tipo de Avaria</label>
                    <input type="text" name="tipo_de_avaria" class="form-control" id="tipo_de_avaria" placeholder="tipo de avaria do carro"
                        value="{{ old('tipo_de_avaria') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="cliente_id" class="form-label">Proprietario</label>
                    <select name="cliente_id" id="cliente_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($clientes as $cliente)
                            <option value="{{ $cliente->id }}"
                                {{ old('cliente_id' ) == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }}</option>
                        @empty
                            <option value="">Nenhum Proprietario</option>
                        @endforelse
                    </select>
                </div>


                <div class="col-md-4 col-sm-12">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor da carro"
                        value="{{ old('valor') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="ano" class="form-label">Ano</label>
                    <input type="date" name="ano" class="form-control" id="ano"
                        value="{{ old('ano') }}">
                </div>

                

                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
