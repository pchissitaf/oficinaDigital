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

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html">Oficina Digital</a></h1>

						<nav class="links">
							<ul>
                                @auth
								<li><a href="{{ route('carro.index') }}">Carros</a></li>
								@can('ver_cliente', $user)
								<li><a href="{{ route('clientes.index') }}">Clientes</a></li>
								@endcan
								@can('ver_funcionario', $user)
								<li><a href="{{ route('funcionarios.index') }}">Funcionarios</a></li>
								@endcan
								<li><a href="{{ route('servicos.index') }}">Servicos</a></li>
								@can('ver_user', $user)
								<li><a href="{{ route('users.index') }}">Usuarios</a></li>
								@endcan
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
								@can('ver_cliente', $user)
								<li><a href="{{ route('clientes.index') }}">Clientes</a></li>
								@endcan
								@can('ver_funcionario', $user)
								<li><a href="{{ route('funcionarios.index') }}">Funcionarios</a></li>
								@endcan
								<li><a href="{{ route('servicos.index') }}">Servicos</a></li>
								@can('ver_user', $user)
								<li><a href="{{ route('users.index') }}">Usuarios</a></li>
								@endcan
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions stacked">									
									<li><a href="{{ route('users.show', ['user' => auth()->user()->id]) }}" class="button large fit">{{auth()->user()->name}}</a></li>
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

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="single.html">Magna sed adipiscing</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">November 1, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
									</div>
								</header>
								<a href="single.html" class="image featured"><img src="{{asset('images/pic01.jpg')}}" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
								<footer>
									<ul class="actions">
										<li><a href="single.html" class="button large">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon solid fa-heart">28</a></li>
										<li><a href="#" class="icon solid fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="single.html">Ultricies sed magna euismod enim vitae gravida</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-25">October 25, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
									</div>
								</header>
								<a href="single.html" class="image featured"><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper.</p>
								<footer>
									<ul class="actions">
										<li><a href="single.html" class="button large">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon solid fa-heart">28</a></li>
										<li><a href="#" class="icon solid fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="single.html">Euismod et accumsan</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-22">October 22, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
									</div>
								</header>
								<a href="single.html" class="image featured"><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Cras vehicula tellus eu ligula viverra, ac fringilla turpis suscipit. Quisque vestibulum rhoncus ligula.</p>
								<footer>
									<ul class="actions">
										<li><a href="single.html" class="button large">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon solid fa-heart">28</a></li>
										<li><a href="#" class="icon solid fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

								</section>

								<section>
									<h3>Lists</h3>
									<div class="row">
										<div class="col-6 col-12-medium">
											<h4>Unordered</h4>
											<ul>
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
											</ul>
											<h4>Alternate</h4>
											<ul class="alt">
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
											</ul>
										</div>
										<div class="col-6 col-12-medium">
											<h4>Ordered</h4>
											<ol>
												<li>Dolor pulvinar etiam.</li>
												<li>Etiam vel felis viverra.</li>
											</ol>
											<h4>Icons</h4>
											<ul class="icons">
												<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
											</ul>
										</div>
									</div>
					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
								<header>
									<h2>Oficina Digital</h2>
									<p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="single.html">Rutrum neque accumsan</a></h3>
												<time class="published" datetime="2015-10-19">October 19, 2015</time>
												<a href="#" class="author"><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
											</header>
											<a href="single.html" class="image"><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
										</article>


								</div>
							</section>

						<!-- Posts List -->
							<section>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="single.html">Lorem ipsum fermentum ut nisl vitae</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="single.html" class="image"><img src="{{asset('images/avatar.jpg')}}" alt="" /></a>
										</article>
									</li>
								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>About</h2>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
								<ul class="actions">
									<li><a href="#" class="button">Learn More</a></li>
								</ul>
							</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
							</section>

					</section>

			</div>

		<!-- Scripts -->
            <script src="{{asset('assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('assets/js/browser.min.js')}}"></script>
			<script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
            <script src="{{asset('assets/js/util.js')}}"></script>
			<script src="{{asset('assets/js/main.js')}}"></script>

	</body>
</html>