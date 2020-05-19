
		@if (session('message'))
          <div class="alert alert-success">
            {{ session('message') }}
          </div>
        @endif


<div class="card">
	<div class="card-header card-header-success">
		<h4 class="card-title">Sala</h4>
		<p class="card-category">criar uma nova Sala</p>
		<p class="card-category">Editar uma nova Sala</p>
	</div>
	<div class="card-body">   
		<form action="{{ route('saveroom') }}" method="POST">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label for="name">Nome</label>
				<input type="text" name="name" class="form-control"  placeholder="Nome Sala">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="description">Descrição</label>
					<textarea  class="form-control"  name="description" placeholder="Insira Descrição da Sala"></textarea>
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
					<input type="password" name="key" id="key" class="form-control"  placeholder="chave">
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
				  <label for="place">Local</label>
				<input type="text" name="place" class="form-control"  placeholder="Local">
				podia ser um maps ou algo assim
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
			  		<label for="#">horário padrão</label>
					<input type="time" name="standard_time" id="standard_time" class="form-control"  placeholder="horário padrão">
				</div>
			</div>


			<div>
				insirir imagem
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
			  		<label for="modalitySlug">Modalidade</label>
					<select id="modalitySlug" name="modalitySlug">
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

			<button type="submit" class="btn btn-success pull-right">Salvar Sala</button>
			<div class="clearfix"></div>
		</form>
	</div>
</div>
