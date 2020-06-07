<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$room->slug}}</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
</head>
<body>
    <user id=user name="" value="{{ Auth::user() }}" ></user>
    <room id=room name="" value="{{ $room }}" ></room>
    <header class="cabecalho">
        <a href="{{ route('salas', $room->modality['slug']) }}" class="btn-voltar">voltar</a>
        <span class="">
            <div class="foto_perfil">
                <?php if ($room->pathImage): ?>
                    <div class="foto_perfil" style="
                      background-image: url('/{{$room->pathImage}}');
                    ">
                    </div>
                <?php else: ?>
                  <div class="foto_perfil" 
                        style="
                                background: url('/image/null-img.png');
                        ">
                  </div>
                <?php endif ?>
            </div>
        </span>
        <span>
            <div>{{ $room->name }}</div>
            <span class="qtd_user_on">Total de usuários online: ?</span>
            <button>membros</button>
        </span>
    </header>
    <main class="corpo-chat">
        <div class="area-de-msg"  id="chat">
            <!-- insere html via JS aqui-->
        </div>
        <div class="escreve">
            <input class="msg-texto" type="textarea"  id="contentMessage">
            <button class="enviar-msg" id="btn_send_chat">< </button>
        </div>
    </main>
</body>
<script>
    
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js.map"></script>
<script>
    let roomID = "{{ $room->_id  }}";
</script>
<script src="{{ asset('js/chat.js')}}"></script>
</html>