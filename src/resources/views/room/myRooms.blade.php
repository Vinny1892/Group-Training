@extends('room.main')
@section('content')
<h2>Pesquisar</h2>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card card-flip">
          <div class="card-inner">
            <div class="card-front" style="background: url(http://beta.popinmarket.com.br/wp-content/uploads/woocommerce-placeholder.png)">
            </div>
            <div class="card-back">
              <h3>Atividade Física</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card card-flip">
          <div class="card-inner">
            <div class="card-front" style="background: url(http://beta.popinmarket.com.br/wp-content/uploads/woocommerce-placeholder.png)">
            </div>
            <div class="card-back">
              <h3>Atividade Física</h3>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card card-flip">
          <div class="card-inner">
            <div class="card-front" style="background: url(http://beta.popinmarket.com.br/wp-content/uploads/woocommerce-placeholder.png)">
            </div>
            <div class="card-back">
              <h3>Atividade Física</h3>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card card-flip">
          <div class="card-inner">
            <div class="card-front" style="background: url(http://beta.popinmarket.com.br/wp-content/uploads/woocommerce-placeholder.png)">
            </div>
            <div class="card-back">
              <h3>Atividade Física</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection



<main class="container">
  <div class="main-content">
    <h5 class="title-categories">Modalidades</h5>
    <div class="search-categories">
        <div class="search-input">
            <input type="text" placeholder="Pesquise por nome">
        </div>
        <div class="order">
            <span class="title-order">Ordenar por:</span>
            <div>
                <div class="input-field">
                    <select>
                        <option value="" disabled selected>Selecione</option>
                        <option value="1">Nome</option>
                        <option value="2">Usuários ativos</option>
                        <option value="2">Categoria</option>
                        <option value="2">TAG</option>
                        <option value="2">TAG</option>
                        <option value="2">Mais usadas</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
  </div>  

  <section class="goals js-ua-desktop">
    @foreach ($modalities as $modality)
      <div class="col-sm-6 col-md-4">
            <a href="{{ route('salas', $modality) }}">
                <article class="box-common">
                    <figure>
                        <div class="image-category" style="background-image: url('{{$modality->url}}')">
                        <img src="" alt="">
                    </div>
                    </figure>
                    <figcaption>
                        <h4>{{$modality->name}}</h4>
                        <p>{{$modality->description}} .</p>
                    </figcaption>
                </article>
            </a>
        </div>
      @endforeach
  </section>
</main>

