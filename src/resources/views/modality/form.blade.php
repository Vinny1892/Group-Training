		@if (session('message'))
          <div class="alert alert-success">
            {{ session('message') }}
          </div>
        @endif


<div class="card">
	<div class="card-header card-header-success">
		<h4 class="card-title">Criar/Editar Modadelide</h4>
		<p class="card-category">criar/editar uma nova Modadelide</p>
	</div>
	<div class="card-body">   
		<form action="{{ route('savemodality') }}" method="POST">
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
					<input id="profile_image" type="file" alt="Submit" width="48" height="48" class="" name="profile_image[]">
			</div>

			<input type="hidden" name="_id" value=""><!-- preencher com JS se for editar -->
			<button type="submit" class="btn btn-success pull-right">Salvar</button>
			<div class="clearfix"></div>
		</form>
	</div>
</div>