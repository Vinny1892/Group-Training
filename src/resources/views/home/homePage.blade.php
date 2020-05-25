@extends('home.main')
@section('home')
<header class="home">

    <nav class="navbar">
        <div class="nav-wrapper">
            <a class="navbar-brand"
            href="{{ route('home') }}"
            title="Inicio"
            tabIndex="-1">
                <img    src="{{ asset('img/logo.png') }}"
                alt="logo"
                class="hidden-xs hidden-sm hidden-md"
                width="130"/>
            </a>
            <a href="#" class="brand-logo">Group Training</a>
             <ul id="nav-mobile" class="right hide-on-med-and-down">
                @if (!Auth::check())
                    <li>
                        <a href="{{route('register')}}" role="button" title="Cadastre-se"
                           class="">Cadastre-se</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" role="button" title="Entrar " class="">Entrar </a>
                    </li>
                @else
                    <li>
                        <div>notificações</div>
                    </li>
                    <li>
                        <p class="navbar-btn">
                            <a href="{{ route('painel') }}" role="button" title="Publique um projeto"
                               class="btn btn-success">Painel</a>
                        </p>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

</header>

<section class="">
    @include('modality.allModalities')
</section>

<section class="">
    <div class="container">
        <p class="h3 text-center">Empresas parceiras </p>
        <ul class="list-unstyled list-inline">
            @foreach ($patrocinadores as $patrocinador)
                <li>
                    <img src="{{ asset('img/'.$patrocinador.'.png') }}" alt="<?= $patrocinador ?>">
                </li>
            @endforeach
        </ul>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="row row-condensed footer__copy">
            <div class="col-lg-6 col-xs-12 col-sm-6 col-full-left">
                <p>
                    <a href="/dashboard">
                        <img src="logo.png"
                             alt="logo" width="122">
                    </a>
                </p>
                &copy; 2020 | Group Training - Todos os direitos reservados
            </div>
            <div class="col-lg-6 col-xs-12 col-sm-6 text-right">
                <div class="footer__social-icons">
                    <a href="#" title="Veja-nos no YouTube">
                        <span class="icon-youtube"></span>
                    </a>

                    <a href="#" title="Siga-nos no Instagram">
                        <span class="icon-instagram"></span>
                    </a>

                    <a href="#" title="Siga-nos no Facebook">
                        <span class="icon-facebook"></span>
                    </a>

                    <a href="#" title="Siga-nos no Twitter">
                        <span class="icon-twitter-b"></span>
                    </a>

                    <a href="#" title="Siga-nos no Linkedin">
                        <span class="icon-linkedin"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</footer>
@endsection