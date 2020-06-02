@extends('dashboard.layout.layout')
@section('content')

@if (session('message'))
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
@endif
@if ($errors->any())
  @foreach ($errors->all() as $error)
    
      <div class="alert alert-danger"> <p>{{ $error }}</p> </div>
    
  @endforeach
@endif


<div class="card">
	<div class="card-header card-header-success">
		<h4 class="card-title">Sala</h4>
		<p class="card-category">{{$cardTitle}}</p>
	</div>

	<div class="card-body">  
	@if(isset($room))   
		<form action="{{ route('updateroom', ['room'=> $room->_id]) }}" method="POST" enctype="multipart/form-data">
		<input type="hidden" id="roomSlug" name="roomSlug" value="{{$room->slug}}">
	@else
		<form action="{{ route('saveroom') }}" method="POST" enctype="multipart/form-data">
	@endif		
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label for="name">Nome</label>
				<input type="text" name="name" class="form-control"  placeholder="Nome Sala" value="{{$room ? $room->name : old('name') }}">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="description">Descrição</label>
					<textarea  class="form-control"  name="description" placeholder="Insira Descrição da Sala" >{{$room ? $room->description : old('description')}}</textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="#">Público</label>
					<input type="radio" id="public" name="public" value="public">
					<label for="public">Publico</label><br>
					<input type="radio" id="private" name="public" value="private">
					<label for="private">Privado</label><br>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
			  		<label for="#">senha</label>
					<input type="password" name="key" id="key" class="form-control"  placeholder="chave" value="{{$room ? $room->password : ''}}">
				</div>
			</div>
			
			<!-- nao sei aonde guardar os tipos de locais, (quadra, campo, digital, online, rede, lan, rua, club, fazenda, trilha)
			<div class="form-row">
				<div class="form-group col-md-6">
                	<label for="place">Tipo do Local</label>
                	foreach($allplaceType as $placeType)
						<div class="form-group col-md-6">
					  		<label for="placeType">{$placeType->name}</label>
							<input type="checkbox" id="{$placeType->name}" name="{$placeType->name}" value="{$placeType->_id}">
						</div>
					endforeach
				</div>
			</div>
			-->
			<div class="form-row">
				<div class="form-group col-md-6">
			  		<label for="modalitySlug">Modalidade</label>
					<select id="modalitySlug" name="modalitySlug" required>
						@foreach($allModalities as $modality)
							<option value="{{$modality->slug}}">{{$modality->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="form-row" id="categorias">
		  		<label for="category">Categorias</label>
		  		<select id="categoriesSlug" name="categoriesSlug[]" multiple>
					@foreach($allCategories as $category)
						<option value="{{$category->slug}}"> {{$category->name}} </option>
					@endforeach
				</select>
			</div>
			<div class="form-row">
				<p class="col-12">
					<label for="inputimage">Imagem</label>
				</p>
				<input type="file" name="profileImage">
			</div>

			<div class="card">
				<div class="form-row">
					<div class="form-group col-md-6">
				  		<label for="#">Data</label>
						<input type="date" name="date0['data']" class="form-control" value="{{$room ? $room->date->event0->end_time : old('end_time')}}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
				  		<label for="#">horário de início</label>
						<input type="time" name="start_time0" class="form-control"  placeholder="horário de início" value="{{$room ? $room->date->event0->start_time : old('start_time')}}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
				  		<label for="#">horário de término</label>
						<input type="time" name="end_time0" class="form-control"  placeholder="horário de término" value="{{$room ? $room->date->event0->end_time : old('end_time')}}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
					  <label for="place">Local</label>
					<input type="text" name="place0" class="form-control"  placeholder="Local" value="{{$room ? $room->place : old('place')}}">
					podia ser um maps ou algo assim
					</div>
				</div>
			</div>
			<div id="dates">
				<!-- insere hrml via JS -->
			</div>


			<input type="hidden" name="id_user_adm" value="{{Auth::user()->_id}}">
			<button type="submit" class="btn btn-success pull-right">Salvar Sala</button>
			<div class="clearfix"></div>
		</form>
				<button onclick="insertCardDate()">Adicionar mais datas</button>
	</div>
</div>

<!-- ----------------------------------- -->
<div>
    <h4>Salas</h4>
    <?php if (sizeof($allRooms) > 0): ?>
        <!-- Listagem Salas -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Salas</h4>
                    <p class="card-category">Salas Cadastradas </p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </thead>
                        <tbody>
                            @foreach($allRooms as $room)
                                <tr>
                                    <td>{{$room->_id}}</td>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->description}}</td>
                                    <td >
                                        <a class="edit" href="{{ route('editroom', ['slug' => $room->slug])}}"><i class="material-icons">edit</i></a>
                                    </td>
                                    <td>
                                        <a class="delete" 
                                        href="{{ route('deleteroom', [ 'slug' => $room->slug ] ) }}"><i class="material-icons">close</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <?php echo "nenhuma modalidade ainda"; ?>       
    <?php endif; ?>       
</div>





<script>
	let contador = 0;
	function insertCardDate() {
		let cardDate = document.getElementById('dates');
		contador++;
		cardDate.innerHTML += "<div class="+'card'+">"+
			
			"<div class="+'form-row'+">"+
				"<div class="+'form-group col-md-6'+">"+
			  		"<label>Data</label>"+
					"<input type="+'date'+" name="+'date'+contador+" class="+'form-control'+">"+
				"</div>"+
			"</div>"+

			"<div class="+'form-row'+">"+
				"<div class="+'form-group col-md-6'+">"+
			  		"<label>horário de início</label>"+
					"<input type="+'time'+" name="+'start_time'+contador+" class="+'form-control'+"  placeholder="+'horário de início>'+
				"</div>"+
			"</div>"+

			"<div class="+'form-row'+">"+
				"<div class="+'form-group col-md-6'+">"+
			  		"<label>horário de término</label>"+
					"<input type="+'time'+" name="+'end_time'+contador+" class="+'form-control'+"  placeholder="+'horário de término>'+
				"</div>"+
			"</div>"+		
			"<div class="+'form-row'+">"+
				"<div class="+'form-group col-md-6'+">"+
				  "<label for="+'place'+">Local</label>"+
				"<input type="+'text'+" name="+'place'+contador+" class="+'form-control'+"  placeholder="+'Local'+">"+
				"</div>"+
			"</div>"+

		"</div>";
	}
</script>
@endsection