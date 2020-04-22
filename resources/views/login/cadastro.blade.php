@extends('authentication.app')

@section('content');
<div class="tela-login">
  @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="card red lighten-5">
            <div class="card-content  red-text"> <p>{{ $error }}</p> </div>
            </div>
          @endforeach

@endif
  <div class="row z-depth-3 ">
    <h4 class="center-align" >Registrar-se</h4>
  <form method="POST" action="{{ route('register.storage') }}" class="row">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">person</i>
          <input id="user" name="name" type="text"   value="{{ old('name')  }}" class="validate">
          <label for="user">Usuário</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" value="{{ old('email') }}" name="email" type="email" class="validate">
          <label for="user">Email</label>
        </div>
      </div>

      <div class="row">
          <div class="input-field col s12 ">
            <i class="material-icons prefix">lock</i>
            <input id="password" name="password" type="password" class="validate">
            <label class="" for="password">Senha</label>
      </div>
          <div class="row">
              <div class="input-field col s12 ">
                  <i class="material-icons prefix">lock</i>
                  <input id="password" name="password_confirmation" type="password" class="validate">
                  <label class="" for="password">Confirme sua Senha</label>
              </div>

      <div class="center-align">
          <button style="background-color: #7a297a" class=" waves-light waves-effect  btn" type="submit" >Cadastrar
              <i class="material-icons right">send</i>
          </button>
      </div>
  </form>
  </div>
  </section>
  </div>
@endsection;