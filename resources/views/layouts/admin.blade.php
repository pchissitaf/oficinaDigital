<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">--}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>OficinaDigital</title>
</head>

<body>
    
				
    <header class="p-3 text-bg-primary">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('dashboard') }}" class="nav-link px-2 text-white" >Home</a></li>                                         
                    <li><a href="{{ route('carro.index') }}" class="nav-link px-2 text-white">Carros</a></li>
                    @can('ver_cliente', $user)
                    <li><a href="{{ route('clientes.index') }}" class="nav-link px-2 text-white">Clientes</a></li>@endcan
                    @can('ver_funcionario', $user)
                    <li><a href="{{ route('funcionarios.index') }}" class="nav-link px-2 text-white">Funcionarios</a></li>@endcan
                    <li><a href="{{ route('servicos.index') }}" class="nav-link px-2 text-white">Servicos</a></li>
                    <li><a href="{{ route('orcamentos.index') }}" class="nav-link px-2 text-white">orcamentos</a></li>
                    <li><a href="{{ route('ordenServicos.index') }}" class="nav-link px-2 text-white">ordenServicos</a></li>
                    @can('ver_user', $user)
                    <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Usuarios</a></li>@endcan                                        
                </ul>

                <div class="text-end">
                    @auth
                    <a href="{{ route('logout') }}" type="button" class="btn btn-warning">Terminar Sessao</a>
                    <a href="{{ auth()->user()->name }}" type="button" class="btn btn-warning">{{ auth()->user()->name }}</a>
                    @else
                    <a href="{{ route('login') }}" type="button" class="btn btn-warning">Iniciar Sessao</a>
                    @endauth

                </div>
            </div>
        </div>
    </header>

    <div class="container">

        @yield('content')

    </div>

</body>

</html>
