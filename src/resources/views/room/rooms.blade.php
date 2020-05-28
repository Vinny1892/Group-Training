@extends('room.main')
@section('content')
  <main class="container">
      <?php //dd($rooms); ?>
    <h2>Salas da Modalidade {{ $modality->name }}</h2>
    <div class="row">
      <div class="filtro">

          <div >
            <!-- insere tag via js -->
            <select id="category"></select>
          </div>

        <button  onclick="showRoomByCategory()">Buscar</button>
        
      </div>

      
      <div id="cardRoom">
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
    </div>

   <script >
    let categories = [];
    <?php $i = 0;?>
    @foreach($categories as $category)
      let category<?php echo "$i";?> = {
        name: '{{ $category->name }}',
        slug: '{{ $category->slug }}'
      }
      categories.push(category<?php echo "$i"; ?>);
    <?php $i++;?>      
    @endforeach
   </script>

    <script>
      let rooms = [];
      <?php $i = 0; ?>
      @foreach($rooms as $room)
        let room<?php echo "$i"; ?> = {
          name: '{{  $room->name }}',
          description: '{{ $room->description }}',
          slug: '{{ $room->slug }}',
          pathImage: '{{ $room->pathImage }}',
          categories: [
            @foreach($room->categories as $category)
              {
                name: "{{ $category['name']}}",
                slug: "{{ $category['slug'] }}"
              },
            @endforeach
          ],
        };
        rooms.push(room<?php echo "$i"; ?>);
        <?php $i++; ?>
      @endforeach
    </script>

    <script>
      if (rooms) {
        var opcoes = document.getElementById('category');
        categories.forEach(function (category) {
          opcoes.innerHTML += "<option value="+category.slug+"> "+category.name+" </option> ";
        });
      }else{
        alert('merda');
      }
    </script>

    <script>
      function listRoomByCategory(){
        let slugCategory = document.getElementById('category').value;
        let roomsByCategory = [];
        rooms.forEach(function(room){/*percorre as salas*/
          room.categories.forEach(function(category, index){/*percorre as categorias de uma sala*/
            if (category.slug == slugCategory) {
              roomsByCategory.push(room);
            }
          }); 
        }
        );
        return roomsByCategory;
      }

    </script>

    <script>
      function showRoomByCategory(){
        let rooms = listRoomByCategory();
        let cardRoom = document.getElementById('cardRoom');
        cardRoom.innerHTML = '';
        rooms.forEach(function(room){
          cardRoom.innerHTML += "<a href="+'/sala/'+room.slug+'/chat'+">"+room.name+"</a>"

        });

      }
    </script>
  </main>
@endsection