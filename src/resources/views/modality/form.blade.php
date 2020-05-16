		@if (session('message'))
          <div class="alert alert-success">
            {{ session('message') }}
          </div>
        @endif


<div class="card">
	<div class="card-header card-header-success">
		<h4 class="card-title">Criar Modadelide</h4>
		<p class="card-category">criar uma nova Modadelide</p>
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
					<label for="inputPassword4">Descrição</label>
					<textarea  class="form-control"  name="description" placeholder="Insira Descrição da Modadelide"></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-success pull-right">Salvar Modadelide</button>
			<div class="clearfix"></div>
		</form>
	</div>
</div>
