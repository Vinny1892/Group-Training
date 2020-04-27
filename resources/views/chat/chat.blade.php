<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
</head>
<body>
<user id=user name="" value="{{ Auth::user() }}" ></user>
<header class="cabecalho">
        <span>
            <div class="foto_perfil">
                <a href="">
                    <img src="pobre_e_loco.png" alt="foto-perfil" class="foto_perfil">
                </a>
            </div>
        </span>
        <span>
            <div>FUT praça das araras</div>
            <span class="qtd_user_on">Total de usuários online 5</span>
            <button>membros</button>
        </span>
    </header>
    <main class="corpo-chat">
        <div class="area-de-msg"  id="chat">
            <!-- insere html via JS aqui-->
            <!-- <div class="outro" >
                <span class="tab">
                    <div class="nome">Mateus Ragazzi</div>
                    <span class="msg">Fala consagrado</span>
                </span>
                <span class="horario">20:33</span>
            </div> -->
        </div>
        <div class="escreve">
            <div class="centraliza">
                <input class="msg-texto" type="textarea"  id="contentMessage">
                <button class="enviar-msg" id="btn_send_chat">< </button>
            </div>
        </div>
    </main>
</body>
<script>
    
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="{{ asset('js/chat.js')}}"></script>
</html>