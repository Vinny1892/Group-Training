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
<div  class="content">
	<div class="container-fluid">
	  <div class="row">



<div  class="card">
	<div class="card-header card-header-success">
		<h4 class="card-title">Sala</h4>
		<p class="card-category">{{$cardTitle}}</p>
	</div>

	<div id="main-panel" class="card-body">  
	@if(isset($room))   
		<form action="{{ route('updateroom') }}" method="POST" enctype="multipart/form-data">
		<input type="hidden" id="room_id" name="room_id" value="{{$room->_id}}">
	@else
		<form action="{{ route('saveroom')  }}" id="formStoreRoom" method="POST" enctype="multipart/form-data">
	@endif		
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6 pl-3 pr-3">
				  <label for="name">Nome</label>
					<input type="text" name="name" class="form-control"  placeholder="Nome Sala" value="{{$room ? $room->name : old('name') }}">
				</div>
				<div class="form-group col-md-6 pl-3 pr-3">
			  		<label for="#">Senha</label>
					<input type="password" name="key" id="key" class="form-control"  placeholder="chave">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 pl-3 pr-3">
					<label for="description">Descrição</label>
					<textarea  class="form-control"  name="description" placeholder="Insira Descrição da Sala" >{{$room ? $room->description : old('description')}}</textarea>
				</div>
				<div class="form-group col-md-6 pl-3 pr-3">
					<label for="#">Visibilidade da sala</label><br>
					<input type="radio" id="public" name="public" value="public" 
					@if($room && $room->public == "public")
						{{'checked'}}
					@endif
					>
					<label for="public">Publico</label><br>
					<input type="radio" id="private" name="public" value="private"
					@if($room && $room->public == "private")
						{{'checked'}}
					@endif
					>
					<label for="private">Privado</label><br>
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
				<div class="form-group col-md-6 pl-3 pr-3">
			  		<label for="modalitySlug">Modalidade</label> <br>
					<select id="modalitySlug" name="modalitySlug" required class="form-control">
						<option>Selecione</option>
						@foreach($allModalities as $modality)
							@if($room && $room->modality)
								@if($room->modality['slug'] == $modality->slug)
									<option value="{{$modality->slug}}" selected>{{$modality->name}}</option>
									}
								@else
									<option value="{{$modality->slug}}">{{$modality->name}}</option>
								@endif
							@else
								<option value="{{$modality->slug}}">{{$modality->name}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div id="categorias" class="form-group col-md-6 pl-3 pr-3">
					<label for="category">Categorias</label>
					<select id="categoriesSlug" name="categoriesSlug[]" multiple class="form-control">
						@if($room)
							<?php $show = true ?>
							@foreach($allCategories as $category )
								@foreach($room->categories as $categorySelect)
									@if($categorySelect)
										@if($category->slug == $categorySelect['slug']))
											<option value="{{$category->slug}}" selected> {{$category->name}} </option>
											<?php $show = false ?>
										@endif
									@endif
								@endforeach
								@if($show)
									<option value="{{$category->slug}}" > {{$category->name}} </option>
								@endif
								<?php $show = true ?>
							@endforeach
						@else
							@foreach($allCategories as $category )
								<option value="{{$category->slug}}" > {{$category->name}} </option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="form-row mt-3">
				<div class="col-md-12 pl-3 pr-3">
					<label for="inputimage">Imagem</label> 
					<br>
					<input type="file" name="profileImage">
				</div>
			</div>

			
			<div id="dates" class="">
				<!-- insere hrml via JS -->
			</div>
			<input type="hidden" name="id_user_adm" value="{{Auth::user()->_id}}">

			<div class="form-row">
				<div class="col-md-6 pl-3 pr-3">
					<button type="button" class="btn btn-outline" onclick="insertCardDate()">Adicionar mais datas</button>
				</div>
				<div class="col-md-6 pl-3 pr-3">
					@if(isset($room))   
						<button type="submit" class="btn btn-success pull-right">Salvar edição da sala: {{$room->name}}</button>
					@else
						<button type="button" onclick="salvarForm()" class="btn btn-success pull-right">Salvar nova Sala</button>
					@endif
				</div>
			</div>
		</form>
	</div>
</div>

<!-- ----------------------------------- -->
<div class="rooms-list">
	<div class="row">
        <!-- Listagem Salas -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Salas</h4>
                    <p class="card-category">Salas Cadastradas </p>
                </div>
                <div class="card-body table-responsive">
    			<?php if (sizeof($roomsOfUser) > 0): ?>
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </thead>
                        <tbody>
                            @foreach($roomsOfUser as $sala)
                                <tr>
                                    <td>{{$sala->_id}}</td>
                                    <td>{{$sala->name}}</td>
                                    <td>{{$sala->description}}</td>
                                    <td >
                                        <a class="edit" href="{{ route('editroom', ['slug' => $sala->slug])}}"><i class="material-icons">edit</i></a>
                                    </td>
                                    <td>
                                        <a class="delete" 
                                        href="{{ route('deleteroom', [ 'slug' => $sala->slug ] ) }}"><i class="material-icons">close</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
					</table>
			<?php else: ?>
				<div class="col-lg-12 mt-3">
					<h5>Nenhuma sala cadastrada ainda!</h5>
				</div> 
			<?php endif; ?>  
                </div>
			</div>
		</div>     
	</div>
</div> 

<script>
	let contador = 0;
	function insertCardDate(date) {

		let cardDate = document.getElementById('dates');
		let vazio = 1;
		cardDate.innerHTML += "<div class="+'card'+">"+
			
			'<div class="form-row m-0 p-3">'+
				'<div class="form-group col-md-6 pl-3 pr-3">'+
			  		"<label>Data</label>"+
					"<input type="+'date'+" name="+'date'+contador+" class="+'form-control'+" value="+(date ? date.date : '')+">"+
				"</div>"+
				'<div class="form-group col-md-6 pl-3 pr-3">'+
				  "<label for="+'place'+">Local</label>"+
				"<input type="+'text'+" name="+'place'+contador+" class="+'form-control'+"  placeholder="+'Local'+" value="+(date ? date.place : '')+">"+
				"</div>"+
			"</div>"+

			'<div class="form-row m-0 p-3">'+
				'<div class="form-group col-md-6 pl-3 pr-3">'+
			  		"<label>horário de término</label>"+
					"<input type="+'time'+" name="+'end_time'+contador+" class="+'form-control'+"  placeholder="+'horário de término'+" value="+(date ? date.end_time : '')+">"+
				"</div>"+
				'<div class="form-group col-md-6 pl-3 pr-3">'+
			  		"<label>horário de início</label>"+
					"<input type="+'time'+" name="+'start_time'+contador+" class="+'form-control'+"  placeholder="+'horário de início'+" value="+(date ? date.start_time : '')+">"+
				"</div>"+
			"</div>"+

		"</div>";
		contador++;
	}
</script>

<script >
    function getDates(){
		let dates = [] ;
		@if ($room) 
			@foreach($room->date as $date)				
				dates.push(
			      	{
				      	'place': "{{$date['place']}}",
			      		'date': "{{$date['date']}}",
				      	'start_time': "{{$date['start_time']}}",
				      	'end_time': "{{$date['end_time']}}",
			      	},
			  	);
			@endforeach
		@endif
		return dates;
    }
</script>
<script>
	@if ($room && count($room->date) > 0)
		let dates = getDates();
		dates.forEach(
			function (data){
				//console.log(data);
				insertCardDate(data);
			}
		);
	@endif
		<?php //dd($room) ?>

</script>
<script>
	let existRoom = "{{$room}}";
	if (!existRoom) {
		insertCardDate();
	}
</script>
<script>
	function salvarForm(){
		Array.from(document.getElementsByClassName('message')).forEach(el => el.remove())

		$('#formStoreRoom').ajaxForm({
		dataType:'json', 
        success: (room) => {
			console.log(room)
			let body = document.getElementById('main-panel');

			 if(room.erros){
				Object.entries(room.erros).forEach(el => {
					console.log(el[1]);
					let div = document.createElement('div');
					div.classList.add("message");
					div.innerHTML = el[1];
					div.classList.add('alert');
					div.classList.add('alert-danger');
					body.prepend(div);
				});
			 }else{
				let div = document.createElement('div');
				div.classList.add("message");
			 	div.innerHTML = "Sala Criada Com Sucesso"
			 	div.classList.add('alert');
			 	div.classList.add('alert-success');
				body.prepend(div);
				let domainWS =  '{{  env("DOMAINWS" , "localhost") }}'
				socket = io(`${domainWS}:4000`);
				socket.emit('roomCreated' , room);
	    		location.reload();
			 }
			}
    	}).submit();
	}	
</script>


@endsection