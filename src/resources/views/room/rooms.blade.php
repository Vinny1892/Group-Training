@extends('room.main')
@section('content')


  <main class="container">
    <h2>Salas da Modalidade {{ $modality->name }}</h2>
    <div class="row">
      @foreach($rooms as $room)
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="card">
            <?php if ($room->pathImage): ?>
              <div class="card-header" style="background: url($room->pathImage)">
              </div>
            <?php else: ?>
              <div class="card-header" style="background: url(http://beta.popinmarket.com.br/wp-content/uploads/woocommerce-placeholder.png)">
              </div>
            <?php endif ?>

            <div class="card-body">
              <h4 class="card-title">Atividade Física</h4>
              <p class="card-text">A equipe de suporte precisa saber que a compilação final do programa deletou todas as entradas na interpolação dinâmica de strings.</p>
              <div class="card-action">
                <a href="#" class="btn btn-primary">&#9;Entrar na sala</a>
              </div>
            </div>
            <div class="card-footer text-muted">
              2 usuários ativos
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </main>


@endsection