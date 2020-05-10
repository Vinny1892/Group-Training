<!-- dashboard da modalidade formularios -->

<?php 
	/*
	$array = "[ 
		'slug'=>'campo',
		'id'=>1,
		'create'=>true,
		'create'=>[true],
	]"
	*/
	/*ainda estou passando só uma string pela url, e nao o arry associativo*/
?>



<a href="<?php echo e(route('createmodalidade', 0 )); ?>">form create</a>
<br>
<?php 
	//$modalitySelecionada = ; 
	$slug = 'quadra';
?>
<a href="<?php echo e(route('editemodalidade', $slug )); ?>">form edit</a>
<?php /**PATH /var/www/html/resources/views/modality/teste.blade.php ENDPATH**/ ?>