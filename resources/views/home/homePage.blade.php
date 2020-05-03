@extends('home.main')
@section('content')

<div class="home-page-container">

	<ul id="user-dropdown" class="dropdown-content">
		<li><a href="#!">Conta</a></li>
		<li><a href="#!">Nova sala</a></li>
		<li><a href="#!">Minhas salas</a></li>
		<li class="divider"></li>
		<li><a href="#!">Sair</a></li>
	</ul>

	<nav class="navbar">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">Group Training</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="{{ route('login') }}">Entrar</a></li>
				<li><a class="dropdown-trigger" href="#!" data-target="user-dropdown">Usuário<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
		</div>
	</nav>

	<div class="main-content">
		<h2 class="title-search-rooms">Pesquisar salas</h2>

		<h3 class="title-categories">Categorias</h3>
		<div class="search-categories">
			<div class="search-input">
				<input type="text" placeholder="Pesquise por nome">
			</div>
			<div class="order">
				<span class="title-order">Ordenar por:</span>

				<div>
					<div class="input-field">
						<select>
							<option value="" disabled selected>Selecione</option>
							<option value="1">Nome</option>
							<option value="2">Usuários ativos</option>
						</select>
					</div>
				</div>

			</div>
		</div>

		<div class="grid-categories">

			@foreach ($categories as $category)
			<div class="category">
				<div class="image-category" style="background-image: url('{{$category->url}}')">
					<img src="" alt="">
				</div>
				<div class="description">
					<span class="category-name">{{$category->name}}</span>
					<span class="category-active-users">{{$category->activeUsers}} usuarios ativos</span>
				</div>
			</div>
			@endforeach

		</div>
	</div>



	<div class="notes">
		se estiver logado, mostra opção de perfil
		<br>
		se não recomendo a tela de login
		<a href="{{ route('login') }}">Login</a>
		<br>
		<a href="{{ route('dashboard') }}">painel de gerenciamento</a>

		<div>conteudo da pagina principal</div>

		<br>
		if (logado):
		<br>
		exbibe a lista das minhas salas que participo
		<br>
		e depois listar todas as modalidades
		<br><br>

		else:
		<br>
		lista todas as modalidades
		</code>

	</div>


	@endsection