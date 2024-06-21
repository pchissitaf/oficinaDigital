@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar funcionario</span>
            <span>
                <a href="{{ route('funcionarios.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('funcionarios.edit', ['funcionario' => $funcionario->id]) }}" class="btn btn-warning btn-sm">Editar</a>
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
                <dd class="col-sm-9">{{ $funcionario->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $funcionario->nome }}</dd>

                <dt class="col-sm-3">Endereco</dt>
                <dd class="col-sm-9">{{ $funcionario->endereco }}</dd>

                <dt class="col-sm-3">bilhete</dt>
                <dd class="col-sm-9">{{ $funcionario->bilhete }}</dd>

                <dt class="col-sm-3">Doc. de Identificação</dt>
                <dd class="col-sm-9">{{ $funcionario->doc_file }}</dd>

                <dt class="col-sm-3">Cargo</dt>
                <dd class="col-sm-9">{{ $funcionario->nivel_id }}</dd>

                <dt class="col-sm-3">Salario</dt>
                <dd class="col-sm-9">{{ 'Akz ' . number_format($funcionario->salario, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Id de Usuario</dt>
                <dd class="col-sm-9">{{ $funcionario->user->email}}</dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($funcionario->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($funcionario->updated_at)->format('d/m/Y H:i:s') }}</dd>

            </dl>
            
        </div>
    </div>
@endsection
