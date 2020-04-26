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
<header class="cabecalho"><img src="" alt="foto-perfil"></header>
    <main class="corpo-chat">
        <div>
            <div>FUT praça das araras</div>
            <span>Total de usuários online 5</span>
            <span>MEMBROS</span>
        </div>
        <div class="area-de-msg" id="chat">
         
           <!-- 
             <div class="eu" >
                <span>^</span> icone de edição da msg, unica função vai ser APAGAR msg
                https://www.flaticon.com/free-icon/settings_126472 
              
            </div>
            -->
        </div>
        <div>
            <input type="textarea" id="contentMessage">
            <button id="btn_send_chat" >enviar</button>
        </div>
    </main>
</body>
<script>
    
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="{{ asset('js/chat.js')}}"></script>
</html>