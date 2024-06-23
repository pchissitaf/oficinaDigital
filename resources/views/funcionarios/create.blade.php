@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Cadastrar funcionario</span>
            <span>
                <a href="{{ route('funcionarios.index') }}" class="btn btn-info btn-sm ">Listar</a>
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

            <form action="{{ route('funcionarios.store') }}" enctype="multipart/form-data" method="POST" class="row g-3">
                @csrf

                <div class="col-md-12 col-sm-12">
                    <label for="nome" class="form-label">nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="nome do funcionario"
                        value="{{ old('nome') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="endereco" class="form-label">endereco</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="endereco do funcionario"
                        value="{{ old('endereco') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="telefone" class="form-label">telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="telefone do funcionario"
                        value="{{ old('telefone') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="bilhete" class="form-label">Bilhete</label>
                    <input type="text" name="bilhete" class="form-control" id="bilhete" placeholder="bilhete do funcionario"
                        value="{{ old('bilhete') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="doc_file" class="form-label">doc_file</label>
                    <input type="file" name="doc_file" class="form-control" id="doc_file" placeholder="doc_file do funcionario"
                        value="{{ old('doc_file') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="nivel_id" class="form-label">Cargo</label>
                    <select name="nivel_id" id="nivel_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($nivels as $nivel)
                            <option value="{{ $nivel->id }}"
                                {{ old('nivel_id') == $nivel->id ? 'selected' : '' }}>
                                {{ $nivel->nome }}</option>
                        @empty
                            <option value="">Nenhum Email de Usuario encontrado</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="salario" class="form-label">salario</label>
                    <input type="text" name="salario" class="form-control" id="salario" placeholder="salario do funcionario"
                        value="{{ old('salario') }}">
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="user_id" class="form-label">Email de Usuario</label>
                    <select name="user_id" id="user_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->email }}</option>
                        @empty
                            <option value="">Nenhum Email de Usuario encontrado</option>
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
