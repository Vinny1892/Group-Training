<h1>Criar modalidade</h1>
<form class="navbar-form" method="post" action="<?php echo e(route('savemodality')); ?>">
	<?php echo csrf_field(); ?>
	<div class="input-group no-border">
		<input type="text" name="title" value="" class="form-control" placeholder="title">
		<input type="text" name="description" value="" class="form-control" placeholder="description">
		<div>
			<h3>categorias</h3>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input type="checkbox" id="checkboxcategories" value="<?php echo e($category); ?>" class="form-check-input"  name="categories">
				<label for="category"><?php echo e($category->title); ?></label>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<div>
			<h3>Tags</h3>
			<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input type="checkbox" id="checkboxtags" value="<?php echo e($tag); ?>" class="form-check-input"  name="tags">
				<label for="tag"><?php echo e($tag->title); ?></label>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<div>
			<h3>Rooms</h3>
			<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<label for="room"><?php echo e($room->title); ?></label>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<button type="submit" class="btn btn-white btn-round btn-just-icon">Salvar</button>
	</div>
</form>
<?php /**PATH /var/www/html/resources/views/modality/formCreate.blade.php ENDPATH**/ ?>