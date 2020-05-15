<h1>Criar modalidade</h1>
<form class="navbar-form" method="post" action="{{ route('savemodality') }}">
	@csrf
	<div class="input-group no-border">
		<input type="text" name="title" value="" class="form-control" placeholder="title">
		<input type="text" name="description" value="" class="form-control" placeholder="description">
		<hr>
		<div>
			<h3>categorias</h3>
			@foreach($categories as $category)
				<input type="checkbox" id="checkboxcategories" value="{{$category}}" class="form-check-input"  name="categories">
				<label for="category">{{$category->title}}</label>
			@endforeach
		</div>
		<hr>
		{{-- <div>
			<h3>Tags</h3>
			@foreach($tags as $tag)
				<input type="checkbox" id="checkboxtags" value="{{$tag}}" class="form-check-input"  name="tags">
				<label for="tag">{{$tag->title}}</label>
			@endforeach
		</div> --}}
		<button type="submit" class="btn btn-white btn-round btn-just-icon">Salvar</button>
	</div>
</form>