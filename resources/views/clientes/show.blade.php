@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar Cliente</span>
            <span>
                <a href="{{ route('clientes.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        {{--<x-alert />--}}
        {{ session('success') }}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire('Pronto!', "{{ session('success') }}", 'success');
            })
        </script>

        <div class="card-body">

            <dl class="row">

                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $cliente->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $cliente->nome }}</dd>

                <dt class="col-sm-3">Endereco</dt>
                <dd class="col-sm-9">{{ $cliente->endereco }}</dd>

                <dt class="col-sm-3">Id de Usuario</dt>
                <dd class="col-sm-9">{{ $cliente->user->email }}</dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($cliente->updated_at)->format('d/m/Y H:i:s') }}</dd>

            </dl>
            
        </div>
    </div>
@endsection
