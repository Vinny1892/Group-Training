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
				<h4 class="card-title">Modadelide</h4>
				<p class="card-category">Criar / Editar</p>
			</div>
			<div class="card-body">
				<form action="{{ route('savemodality') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Nome</label>
							<input type="text" name="name" class="form-control">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="description">Descrição</label>
							<textarea class="form-control" name="description"></textarea>
						</div>
					</div>
					<div class="form-row">
						<p class="col-12">
							<label for="profileImage">Imagem</label>
						</p>
						<input type="file" name="profileImage">
					</div>

					<input type="hidden" name="_id" value="">
					<button type="submit" class="btn btn-success pull-right">Salvar</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>