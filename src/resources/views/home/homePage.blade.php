@extends('home.main')
@section('home')
<header class="home">

    <nav class="navbar">
        <div class="nav-wrapper">
            <a class="navbar-brand" href="{{ route('home') }}" title="Inicio" tabIndex="-1">
                <img src="{{ asset('image/logo.png') }}" alt="logo" width="130" />
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @if (!Auth::check())
                <li>
                    <a href="{{route('register')}}" role="button" title="Cadastre-se" class="">Cadastre-se</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" role="button" title="Entrar " class="">Entrar </a>
                </li>
                @else
                <li>
                    <a href="{{ route('painel') }}" role="button" title="Entrar " class="">Painel</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

</header>

<section class="section-modality">
    <div class="container">
        <h4 class="text-center">Modalidades</h4>
        @include('modality.allModalities')
    </div>
</section>

<section class="section-empresa">
    <div class="container">
        <h4 class="text-center">Empresas parceiras</h4>
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
                <br>
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