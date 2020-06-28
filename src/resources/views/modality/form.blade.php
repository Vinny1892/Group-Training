		@if (session('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
		@endif

		@if ($errors->any())
		@foreach ($errors->all() as $error)

		<div class="alert alert-danger">
			<p>{{ $error }}</p>
		</div>

		@endforeach
		@endif
		<div class="card">
			<div class="card-header card-header-success">
				<h4 class="card-title">Modalidade</h4>
				<p class="card-category">{{$cardTitle}}</p>
			</div>
			<div class="card-body">
				<form action="{{ route('savemodality') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6 pl-3 pr-3">
							<label for="name">Nome</label>
							<input type="text" name="name" class="form-control" value="{{$modality ? $modality->name : old('name')}}">
						</div>
						<div class="form-group col-md-6 pl-3 pr-3">
							<label for="description">Descrição</label>
							<textarea class="form-control" name="description">{{$modality ? $modality->description : old('description')}}</textarea>
						</div>
					</div>
					<div class="form-row mt-3">
						<div class="col-md-12 pl-3 pr-3">
							<label for="profileImage">Imagem</label>
							<br>
							<input type="file" name="profileImage">
						</div>
					</div>

					<input type="hidden" name="_id" value="{{$modality ? $modality->_id : old('_id')}}">
					<button type="submit" class="btn btn-success pull-right">Salvar</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>