@extends('room.main')
@section('content')
  <main class="container">
    <h4>Salas da Modalidade {{ $modality->name }}</h4>
    <div class="row">
      
       <div class="row">
      <div class="filtro">
        <div>
          <label>Categoria</label>
          <select id="category">
            <!-- insere tag via js -->
          </select>
          <button  onclick="showRoomByCategory()">Buscar</button>
        </div> 
        <button  onclick="allCategories()">Listar Todas</button>
      </div>

    <div class="row">
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
                  </div>

              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>

   <script >
    function allCategories(){
      let categories = [];
      <?php $i = 0; ?>
      @foreach($categories as $category)
        let category<?php echo "$i";?> = {
          name: '{{ $category->name }}',
          slug: '{{ $category->slug }}'
        }
        categories.push(category<?php echo "$i"; ?>);
      <?php $i++;?>      
      @endforeach
      return categories;
    }
   </script>

    <script>
      function allRooms(){
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
        return rooms;
      }
    </script>

    <script>
      let rooms = allRooms();
      console.log();
      let categories = allCategories();
      if (rooms) {
        let opcoes = document.getElementById('category');
        categories.forEach(function (category) {
          opcoes.innerHTML += "<option value="+category.slug+"> "+category.name+" </option> ";
        });
      }else{
        alert('merda, rooms n existe no JS');
      }
    </script>

    <script>
      function listRoomsByCategory(){
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
        let cardRoom = document.getElementById('cardRoom');
        cardRoom.innerHTML = '';
        let rooms = listRoomsByCategory();
        rooms.forEach(function(room){
          constructorCardRoom(room, cardRoom);
        });
      }
    </script>

    <script>
      function constructorCardRoom(room, cardRoom){
        cardRoom.innerHTML += "<div class="+'col-lg-3 col-md-3 col-sm-12 col-xs-12'+">"+
        "<a href="+'/sala/'+room.slug+'/chat>'+
          '<div class="card">'+
            hasImage(room)+
            "<div class="+'card-body'+"> <h4 class="+'card-title'+">"+room.name+"</h4> <p class="+'card-text'+">"+room.description+"</p>"+
          '</div>'+
          "</a>"+
        "</div>";
      }

      function hasImage(room){
        if (room.pathImage) {
          return "<div class="+'card-header'+" style="+"background-image:url(/"+room.pathImage+");"+"></div>";
        }else{
          return "<div class="+'card-header'+" style="+"background:url(/image/null-img.png);></div>";
        }
      }
    </script>

    <script>
      function allCategories(){
        let cardRoom = document.getElementById('cardRoom');
        cardRoom.innerHTML = '';
        rooms.forEach(function(room){
          constructorCardRoom(room, cardRoom);
        });
      }
    </script>
  </main>

  <style>
    select {
    display: initial !important; 
}
  </style>

@endsection

