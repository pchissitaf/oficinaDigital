@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar Carro</span>
            <span>
                <a href="{{ route('carro.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('carro.edit', ['carro' => $carro->id]) }}" class="btn btn-warning btn-sm">Editar</a>
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
                <dd class="col-sm-9">{{ $carro->id }}</dd>

                <dt class="col-sm-3">modelo</dt>
                <dd class="col-sm-9">{{ $carro->modelo }}</dd>

                <dt class="col-sm-3">cor</dt>
                <dd class="col-sm-9">{{ $carro->cor }}</dd>

                <dt class="col-sm-3">marca</dt>
                <dd class="col-sm-9">{{ $carro->marca }}</dd>

                <dt class="col-sm-3">tipo</dt>
                <dd class="col-sm-9">{{ $carro->tipo }}</dd>

                <dt class="col-sm-3">Situação</dt>
                <dd class="col-sm-9">
                    <a href="{{ route('carro.change-estado', [ 'carro' => $carro->id])}}">
                        {!! '<span class="badge text-bg-'. $carro->estadoCarro->cor .'">' . $carro->estadoCarro->nome . '</span>' !!}
                    </a>
                </dd>
                <dt class="col-sm-3">tipo de avaria</dt>
                <dd class="col-sm-9">{{ $carro->tipo_de_avaria }}</dd>
                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">{{ 'Akz ' . number_format($carro->valor, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">ano</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($carro->ano)->format('d/m/Y') }}</dd>

                

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($carro->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($carro->updated_at)->format('d/m/Y H:i:s') }}</dd>

            </dl>
            
        </div>
    </div>
@endsection
