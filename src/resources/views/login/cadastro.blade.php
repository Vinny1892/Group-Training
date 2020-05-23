@extends('authentication.app')

@section('content')
<div class="tela-login">
  <div class="container">
    <section class="container white">
      <h4 class="titulo-login">Registrar-se</h4>
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="card red lighten-5">
        <div class="card-content  red-text">
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
      <form method="POST" action="{{ route('register.storage') }}" class="row">
        {{ csrf_field() }}
        <div class="input-field col s12">
          <i class="material-icons prefix">person</i>
          <input id="user" name="name" type="text" value="{{ old('name')  }}" class="validate">
          <label for="user">Usuário</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" value="{{ old('email') }}" name="email" type="email" class="validate">
          <label for="user">Email</label>
        </div>
        <div class="input-field col s12 ">
          <i class="material-icons prefix">lock</i>
          <input id="password" name="password" type="password" class="validate">
          <label class="" for="password">Senha</label>
        </div>
        <div class="input-field col s12 ">
          <i class="material-icons prefix">lock</i>
          <input id="password" name="password_confirmation" type="password" class="validate">
          <label class="" for="password">Confirme sua Senha</label>
        </div>
        <div class="center-align">
          <button class="btn btn-primary" type="submit">Cadastrar
            <i class="material-icons right">send</i>
          </button>
          <p>Já tem uma conta? <a href="{{ route('login') }}">Faça o login</a></p>
          <!-- <div class="center-align" style="margin-top: 20px;" id="parent"> <img style="width: 2vw" src="{{ asset('icons/art.svg')  }}" alt="seletor de cor"> </div> -->
        </div>
      </form>
    </section>
  </div>
</div>

<script src="https://unpkg.com/vanilla-picker@2"></script>
<script>
  let colorBack = localStorage.getItem('color')

  let login = document.querySelector('.tela-login')
  let parent = document.querySelector('#parent')
  if (colorBack != null) {
    login.style.background = colorBack

  }
  let picker = new Picker(parent);
  picker.onChange = function(color) {
    localStorage.setItem('color', color.rgbaString)
    login.style.background = color.rgbaString
  }
</script>
@endsection