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
		<h4 class="card-title">Criar/Editar Modadelide</h4>
		<p class="card-category">criar/editar uma nova Modadelide</p>
	</div>
	<div class="card-body">   
		<form action="{{ route('savemodality') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label for="inputEmail4">Nome</label>
				<input type="text" name="name" class="form-control"  placeholder="Nome Modadelide">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputdescription">Descrição</label>
					<textarea  class="form-control"  name="description" placeholder="Insira Descrição da Modadelide"></textarea>
				</div>
			</div>
			<div class="form-row">
					<label for="inputimage">Imagem</label>
					<input type="file" name="profileImage">
			</div>

			<input type="hidden" name="_id" value=""><!-- preencher com JS se for editar -->
			<button type="submit" class="btn btn-success pull-right">Salvar</button>
			<div class="clearfix"></div>
		</form>
	</div>
</div>