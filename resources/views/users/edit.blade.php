@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Editar user</span>
            <span>
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
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

            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-12 col-sm-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome do user"
                        value="{{ old('name', $user->name) }}">
                </div>
                <div class="col-md-12 col-sm-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Nome do user"
                        value="{{ old('email', $user->email) }}">
                </div> 

                <div class="col-md-4 col-sm-12">
                    <label for="nivel_id" class="form-label">Email de Usuario</label>
                    <select name="nivel_id" id="nivel_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($nivels as $nivels)
                            <option value="{{ $nivels->id }}"
                                {{ old('nivel_id', $user->nivel_id) == $nivels->id ? 'selected' : '' }}>
                                {{ $nivels->nome }}</option>
                        @empty
                            <option value="">Nenhum Email de Usuario encontrado</option>
                        @endforelse
                    </select>
                </div>
                
                <div class="col-md-12 col-sm-12">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Nome do user"
                        value="{{ old('password', $user->password) }}">
                </div> 

                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
