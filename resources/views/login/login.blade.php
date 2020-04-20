<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
      <h4 class="center-align" >Login</h4>
      <form method="post" action="{{ route('login.login') }}" class="row">
        @csrf
        <div class="row">

          <div class="input-field col s12" >
            <i class="material-icons prefix">person</i>
            <input id="email" name="email" type="email" class="validate"/>
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
          <input class="waves-effect waves-light btn" type="submit" value="Login" />
        </div>

        <div class="registrar center-align">
        <p>Não tem conta? <a href="{{ route('register.show') }}">Registre-se</a></p>
          <a href="{{ route('login.google') }}"><i class="fab fa-google color-icon-google"></i></a>
          <a href="{{ route('login.facebook') }}"><i class="fab fa-facebook color-icon-fb" ></i></a>
        </div>

      </form>
    </section>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </main>
</html>