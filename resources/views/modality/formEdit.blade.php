<h1>Editar modalidade</h1>
	<form class="navbar-form" method="post" action="{{ route('editemodalidade') }}">
		@csrf
	<div class="input-group no-border">
		<input type="text" value="" class="form-control" placeholder="title">
		<input type="text" value="" class="form-control" placeholder="description">
		<div>
			<h3>categorias</h3>
			<?php $categoriesChecked = $modality->id_categories; ?>
			@foreach($categories as $category)
				@if(in_array($category, $categoriesChecked))
					<input type="checkbox" id="checkboxcategories" value="{{$category}}" class="form-check-input"  name="categories" checked>
				@else
					<input type="checkbox" id="checkboxcategories" value="{{$category}}" class="form-check-input"  name="categories">
				@endif
				<label for="category">{{$category->title}}</label>
			@endforeach
		</div>
		<div>
			<h3>Tags</h3>
			<?php $tagsChecked = $modality->id_tags; ?>
			@foreach($tags as $tag)
				<input type="checkbox" id="checkboxtags" value="{{$tag}}" class="form-check-input"  name="tags">
				<label for="tag">{{$tag->title}}</label>
			@endforeach
		</div>
		<div>
			<h3>Rooms</h3>
			@foreach($rooms as $room)
				<label for="category">{{$room->title}}</label>
			@endforeach
		</div>
		<button type="submit" class="btn btn-white btn-round btn-just-icon">Salvar</button>
	</div>
</form>