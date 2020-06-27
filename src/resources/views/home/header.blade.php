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
                    <a href="{{ route('user.edit' , ['slugName' => Auth::user()->slug]) }}" role="button" title="Entrar " class="">Painel</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

</header>