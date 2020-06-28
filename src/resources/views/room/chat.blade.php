<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$room->slug}}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assetsDashboard/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
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
                <button type="button" class="btn-get-info-room" data-toggle="modal" data-target="#exampleModalCenter">
                    Informações da sala
                </button>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informações da sala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="info">
                            <span class="title">Nome da sala:</span>
                            <span>{{ $room->name }}</span>
                        </div>

                        <div class="info">
                            <span class="title">Descrição:</span>
                            <span>{{ $room->description }}</span>
                        </div>

                        <div class="info">
                            <span class="title">Categorias:</span>
                            @foreach ($room->categories as $category)
                            <span class="category">{{$category["name"]}}</span>
                            @endforeach
                        </div>


                        <div class="info">
                            <span class="title">Datas agendadas:</span>
                            
                            @foreach ($room->date as $date)
                            <div class="date">
                                <div>
                                    <span class="title">Local:</span>
                                    <span>{{$date['place']}}</span>
                                </div>
                                <div>
                                    <span class="title">Data:</span>
                                    <span>{{$date['date']}}</span>
                                </div>
                                <div>
                                    <span class="title">Horário de inicio:</span>
                                    <span>{{$date['start_time']}}</span>
                                </div>
                                <div>
                                    <span class="title">Horário de término:</span>
                                    <span>{{$date['end_time']}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>



                    </div>
                </div>
            </div>
        </div>
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

<script src="{{ asset('assetsDashboard/js/core/jquery.min.js') }}"></script>
<script src="{{asset('assetsDashboard/js/core/popper.min.js')}}"></script>
<script src="{{asset('assetsDashboard/js/core/bootstrap-material-design.min.js')}}"></script>

</html>