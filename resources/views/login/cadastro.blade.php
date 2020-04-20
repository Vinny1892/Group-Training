<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />

    <title>Group Training</title>
  </head>


<main class="tela-login" >
  @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="card red lighten-5">
            <div class="card-content  red-text"> <p>{{ $error }}</p> </div>
            </div>
          @endforeach

@endif
  <section class="row z-depth-3 ">
    <h4 class="center-align" >Registrar-se</h4>
  <form method="POST" action="{{ route('register.storage') }}" class="row">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">person</i>
          <input id="user" name="name" type="text" class="validate">
          <label for="user">Usuário</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="email" class="validate">
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
        <input class="waves-effect waves-light btn" type="submit" value="Cadastrar">
      </div>
      
    </form>
  </section>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </main>
</html>