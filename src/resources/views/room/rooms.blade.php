@extends('room.main')
@section('content')
  <main class="container">
      <?php //dd($rooms); ?>
    <h2>Salas da Modalidade {{ $modality->name }}</h2>
    <div class="row">
      @foreach($rooms as $room)
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="{{ route('chat', $room->slug) }}">
            <div class="card">
                <?php if ($room->pathImage): ?>
                  <div class="card-header" style="
                      background-image: url('/{{$room->pathImage}}');
                  ">
                  </div>
                <?php else: ?>
                  <div class="card-header" 
                        style="
                                background: url('/image/null-img.png');
                        ">
                  </div>
                <?php endif ?>

                <div class="card-body">
                  <h4 class="card-title">{{$room->name}}</h4>
                  <p class="card-text">{{$room->description}}</p>
                  <div class="card-action"> </div>
                </div>
                <div class="card-footer text-muted">
                  2 usuários ativos
                </div>
            </div>
          <button class="btn btn-primary">&#9;Entrar na sala</button>
          </a>
        </div>
      @endforeach
    </div>
  </main>
@endsection