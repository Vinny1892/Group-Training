
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

			<div class="form-row">
				<div class="form-group col-md-6">
			  		<label for="#">Modalidade</label>
					<select id="cars">
						@foreach($allModalities as $modality)
							<option value="{{$modality->id}}">{{$modality->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div>
				imagem

			</div>
			<div class="form-row">
		  		<label for="tags">Categorias</label>
				@foreach($allCategories as $category)
					<div class="form-group col-md-6">
				  		<label for="tags">{{$category->name}}</label>
						<input type="checkbox" id="{{$category->id}}" name="{{$category->name}}">
					</div>
				@endforeach
			</div>
[
						"repeat"=> [
	                        "weekly"=> "$value->weekly",
	                        "Friday"=> "$request->date->Friday",
	                        "start_date" => "$request->date->start_date",
	                        "end_date"=> "$request->date->end_date",
	                        "number_of_repetitions"=> "$request->date->number_of_repetitions"
                    ],
                    "custom_schedules"=> [
                        [
                            "data"=> "$request->custom_schedules->data",
                            "schedule"=> "$request->custom_schedules->schedule"
                        ]
                    ]


			<button type="submit" class="btn btn-success pull-right">Salvar Sala</button>
			<div class="clearfix"></div>
		</form>
	</div>
</div>
