@extends('authentication.app')
@section('content')
<div class="tela-login">
  <div class="container">
    <section class="container white">
      <h4 class="titulo-login">Login</h4>
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="card red lighten-4 m-lateral-20">
        <div class="card-content card-action fad">
          <p>{{ $error }}</p>
        </div>
      </div>
      @endforeach
      @endif
      <div class="row">
        <div class="col s6">
          <div class="card google m-lateral-20">
            <div class="card-content card-action">
              <a href="{{ route('login.google') }}">
                <img style="width: 2vw" src="{{ asset("icons/google.svg") }}" alt="login google">
                Acessar com Google
              </a>
            </div>
          </div>

        </div>
        <div class="col s6">
          <div class="card facebook m-lateral-20">
            <div class="card-content card-action">
              <a href="{{ route('login.facebook') }}">
                <img style="width: 2vw" src="{{ asset("icons/facebook.svg") }}" alt="login facebook">
                Acessar com Facebook
              </a>
            </div>
          </div>
        </div>
      </div>
      <form method="post" action="{{ route('login.login') }}" class="row">
        @csrf
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">person</i>
            <input id="email" name="email" value="{{ old('email') }}" type="email" class="validate" />
            <label for="email">Email</label>
          </div>

          <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
            <input id="password" name="password" type="password" class="validate" />
            <label class="" for="password">Senha</label>
          </div>
        </div>

        <div class="center-align">
          <button class="btn btn-primary" type="submit">Login
            <i class="material-icons right">send</i>
          </button>
        </div>

        <div class=" center-align">
          <p>Não tem conta? <a href="{{ route('register') }}">Registre-se</a></p>
        </div>
        <!-- <div class="center-align" style="margin-top: 20px;" id="parent"> <img style="width: 2vw" src="{{ asset('icons/art.svg')  }}" alt="seletor de cor"> </div> -->
      </form>
    </section>
  </div>
  <script src="https://unpkg.com/vanilla-picker@2"></script>
  <script>
    let colorBack = localStorage.getItem('color');

    let login = document.querySelector('.tela-login');
    let parent = document.querySelector('#parent');
    if (colorBack != null) {
      login.style.background = colorBack;

    }
    let picker = new Picker(parent);
    picker.onChange = function(color) {
      localStorage.setItem('color', color.rgbaString);
      login.style.background = color.rgbaString;
    };
  </script>
</div>

@endsection