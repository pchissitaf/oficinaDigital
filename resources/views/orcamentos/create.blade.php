@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar orcamento</span>
            <span>
                <a href="{{ route('orcamentos.index') }}" class="btn btn-info btn-sm ">Listar</a>
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

            <form action="{{ route('orcamentos.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-12 col-sm-12">
                    <label for="valor" class="form-label">valor</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="valor do orcamento"
                        value="{{ old('valor') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="estado" class="form-label">estado</label>
                    <input type="text" name="estado" class="form-control" id="estado" placeholder="estado do orcamento"
                        value="{{ old('estado') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="servico_id" class="form-label">Servico</label>
                    <select name="servico_id" id="servico_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($servicos as $servico)
                            <option value="{{ $servico->id }}"
                                {{ old('servico_id') == $servico->id ? 'selected' : '' }}>
                                {{ $servico->nome }}</option>
                        @empty
                            <option value="">Nenhum Servico encontrado</option>
                        @endforelse
                    </select>
                </div>                

                <div class="col-md-4 col-sm-12">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select name="cliente_id" id="cliente_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($clientes as $cliente)
                            <option value="{{ $cliente->id }}"
                                {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }}</option>
                        @empty
                            <option value="">Nenhum Cliente encontrado</option>
                        @endforelse
                    </select>
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
