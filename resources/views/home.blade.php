<!DOCTYPE HTML>
<!--
	Oficina Digital by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Oficina Digital by Laravel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />

	</head>
    <body class="is-preload">
        <div id="wrapper">

            <!-- Header -->
                <header id="header">
                    <h1><a href="{{ route('dashboard') }}">Oficina Digital</a></h1>

                    <nav class="links">
                        <ul>
                            @auth
                            <li><a href="{{ route('carro.index') }}">Carros</a></li>
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                            <li><a href="{{ route('servicos.index') }}">Servicos</a></li>
                            <li><a href="#">Funcionarios</a></li>
                            @else
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li><a href="{{ route('servicos.index') }}">Servicos</a></li>
                            @endauth
                        </ul>
                    </nav>
                    <nav class="main">
                        <ul>
                            @auth
                            <li class="search">
                                <a class="fa-search" href="#search">Search</a>
                                <form id="search" method="get" action="#">
                                    <input type="text" name="query" placeholder="Search" />
                                </form>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('login') }}" class="fa-user">Log in</a>
                            </li>
                            @endauth
                            <li class="menu">
                                <a class="fa-bars" href="#menu">Menu</a>
                            </li>
                        </ul>
                    </nav>
                </header>

                @auth
            <!-- Menu -->
                <section id="menu">

                    <!-- Search -->
                        <section>
                            <form class="search" method="get" action="#">
                                <input type="text" name="query" placeholder="Search" />
                            </form>
                        </section>

                    <!-- Links -->
                        <section>
                            <ul class="links">
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li><a href="{{ route('carro.index') }}">Carros</a></li>
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                            <li><a href="{{ route('servicos.index') }}">Servicos</a></li>
                            <li><a href="#">Funcionarios</a></li>
                            </ul>
                        </section>

                    <!-- Actions -->
                        <section>
                            <ul class="actions stacked">
                                <li><a href="{{ route('logout') }}" class="button large fit">Terminar Sessão</a></li>
                            </ul>
                        </section>
                    @else
                    <!-- Menu -->
                <section id="menu">

                    <!-- Search -->
                        <section>
                            <form class="search" method="get" action="#">
                                <input type="text" name="query" placeholder="Search" />
                            </form>
                        </section>

                    <!-- Links -->
                        <section>
                            <ul class="links">
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li><a href="{{ route('servicos.index') }}">Servicos</a></li>
                            </ul>
                        </section>

                        <section>
                            <ul class="actions stacked">
                                <li><a href="{{ route('login') }}" class="button large fit">Iniciar Sessão</a></li>
                                <li><a href="{{ route('register') }}" class="button large fit">Cadastrar-se</a></li>
                            </ul>
                        </section>
                    @endauth

                </section>
            </div>
            <!-- Main -->
            <!-- Scripts -->
            <script src="{{asset('assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('assets/js/browser.min.js')}}"></script>
			<script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
            <script src="{{asset('assets/js/util.js')}}"></script>
			<script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>