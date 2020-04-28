@extends('authentication.app')
@section('content')
<div class="tela-login">
@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="card red lighten-5">
      <div class="card-content  red-text"> <p>{{ $error }}</p> </div>
    </div>
  @endforeach
@endif
<section class="row z-depth-3 login ">
  <h4 class="center-align" >Login</h4>
  <form method="post" action="{{ route('login.login') }}" class="row">
    @csrf
    <div class="row">
      <div class="input-field col s12" >
        <i class="material-icons prefix">person</i>
        <input id="email" name="email" value="{{ old('email') }}" type="email" class="validate"/>
        <label for="email">Email</label>
      </div>
    </div>

    <div class="row" >
      <div class="input-field col s12">

        <i class="material-icons prefix">lock</i>
        <input id="password"  name="password"  type="password" class="validate"/>
        <label class="" for="password">Senha</label>
      </div>
    </div>

    <div class="center-align">
      <button style="background-color: #7a297a" class="waves-effect waves-light btn" type="submit" >Login
        <i class="material-icons right">send</i>
      </button>
    </div>

    <div class=" center-align">
      <p>Não tem conta? <a href="{{ route('register') }}">Registre-se</a></p>
      <a href="{{ route('login.google') }}"><i class="fab fa-google color-icon-google"></i></a>
      <a href="{{ route('login.facebook') }}"><i class="fab fa-facebook color-icon-fb" ></i></a>
    </div>
    <div> <div id='parent'>seleciona a cor</div> </div>

  </form>
</section>
</div>
<script src="https://unpkg.com/vanilla-picker@2"></script>
<script>
   let colorBack = localStorage.getItem('color');
 
   let login = document.querySelector('.tela-login');
   let parent = document.querySelector('#parent');
   if(colorBack != null){
        login.style.background = colorBack;

   } 
   let picker = new Picker(parent);
   picker.onChange = function(color) {
        localStorage.setItem('color' , color.rgbaString);
        login.style.background = color.rgbaString;
    };

</script>

@endsection
