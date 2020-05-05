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
    <title>Instalação</title>
</head>
<main>
    @section('content')
        <div class="tela-login">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="card red lighten-5">
                        <div class="card-content  red-text"> <p>{{ $error }}</p> </div>
                    </div>
                @endforeach

            @endif
            <div class="row z-depth-3  login">
                <h4 class="center-align" >Cadastro de Usuario Administrador</h4>
                <form method="POST" action="{{ route('register.storage') }}" class="row">
                    {{ csrf_field() }}
                <input type="hidden"  name="key" value="seila123">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input id="user" name="name" type="text"   value="{{ old('name')  }}" >
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
            </section>
        </div>
        <script src="https://unpkg.com/vanilla-picker@2"></script>
        <script>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>