@extends('modality.main')
@section('modalities')
    <div class="modality-page-container">
        <ul id="user-dropdown" class="dropdown-content">
            <li><a href="#!">Conta</a></li>
            <li><a href="#!">Nova sala</a></li>
            <li><a href="#!">Minhas salas</a></li>
            <li class="divider">zzzzzzzz</li>
            <li><a href="#!">Sair</a></li>
        </ul>

        <nav class="navbar">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Group Training</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('login') }}">Entrar</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="user-dropdown">Usuário</a></li>
                </ul>
            </div>
        </nav>

        <div class="main-content">
            <h2 class="title-search-rooms">Pesquisar salas</h2>

            <h3 class="title-categories">Modalidades</h3>
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
                @foreach ($modalities as $modality)
                    <div class="category">
                        <div class="image-category" style="background-image: url('{{$modality->url}}')">
                            <img src="" alt="">
                        </div>
                        <div class="description">
                            <span class="category-name">{{$modality->title}}</span>
                           <!-- <span class="category-active-users">{{$modality->activeUsers}} usuarios ativos</span> -->
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>





@endsection