@extends('authentication.app')

@section('content')
<div class="tela-login">
  <div class="container">
    <section class="container white">
      <h4 class="titulo-login">Registrar Administrador</h4>
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="card red lighten-5">
        <div class="card-content  red-text">
          <p>{{ $error }}</p>
        </div>
      </div>
      @endforeach
      @endif
      <form method="POST" action="{{ route('storage.admir') }}" class="row">
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
         <div class="center-align" style="margin-top: 20px;" > 
          <colorseletor id="parent" >
              <img style="width: 2vw" src="{{ asset('icons/art.svg')  }}" alt="seletor de cor"> 
          </colorseletor>
        </div> 
        </div>
      </form>
    </section>
  </div>
</div>

<script src="https://unpkg.com/vanilla-picker@2"></script>
<script>
  let colorBack = localStorage.getItem('color');

  let login = document.querySelector('.tela-login');
  let parent = document.querySelector('#parent');
  if (colorBack != null) {
    login.style.background = colorBack
  }
  function setColorBackground(color) {
      localStorage.setItem('color', color.rgbaString);
      login.style.background = color.rgbaString;
    };
    let picker = new Picker({
      parent, 
      color:'#0c15e3ff', 
      popup:'top', 
      cancelButton:true, 
      onDone: setColorBackground,
      editor:false,

      });
</script>
@endsection