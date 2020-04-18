<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
    <title>Group Training</title>
  </head>
  <main class="tela-login" >
    <section class="row z-depth-3 ">
      <h4 class="center-align" >Login</h4>
      <form method="POST" action="home.html" class="row">

        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">person</i>
            <input id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>
        
        <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock</i>
              <input id="password" type="password" class="validate">
              <label class="" for="password">Senha</label>
        </div>

        <div class="center-align"> 
          <input class="waves-effect waves-light btn" type="submit" value="Login">
        </div>

        <div class="registrar center-align">
        <p>Não tem conta? <a href="{{ route('register.show') }}">Registre-se</a></p>
        </div>
        
      </form>
    </section>
  <script src="script.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </main>
</html>