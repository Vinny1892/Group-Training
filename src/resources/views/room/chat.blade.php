<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$room->slug}}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <user id=user name="" value="{{ Auth::user() }}"></user>
    <room id=room name="" value="{{ $room }}"></room>

    <div class="container-chat">
        <header class="cabecalho">
            <a href="{{ route('salas', $room->modality['slug']) }}" class="btn-voltar">
                <i class="material-icons">arrow_back</i>
                <span class="txt-voltar">Voltar</span>
            </a>
            <span>

                <?php if ($room->pathImage) : ?>
                    <div class="foto_perfil" style="
                      background-image: url('/{{$room->pathImage}}');
                    ">
                    </div>
                <?php else : ?>
                    <div class="foto_perfil" style="
                                background: url('/image/null-img.png');
                        ">
                    </div>
                <?php endif ?>

            </span>
            <span>
                <div class="room-name">{{ $room->name }}</div>
                <!-- <span class="qtd_user_on">Total de usuários online: ?</span> -->
            </span>
        </header>
        <main class="corpo-chat">
            <div class="chat">
                <div class="area-de-msg" id="chat">
                    <!-- insere html via JS aqui-->
                </div>
                <div class="escreve">
                    <input class="input-message" type="textarea" id="contentMessage">
                    <button class="btn-send-message" id="btn_send_chat">Enviar</button>
                </div>
            </div>
        </main>
    </div>
</body>
<script>

</script>


<script>
    let domainWS = '{{  env("DOMAINWS" , "localhost") }}'
    let roomID = "{{ $room->_id  }}";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
<script src="{{ asset('js/chat.js')}}"></script>

</html>