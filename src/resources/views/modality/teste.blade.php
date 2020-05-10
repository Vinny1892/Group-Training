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



<a href="{{ route('createmodalidade', 0 ) }}">form create</a>
<br>
<?php 
	//$modalitySelecionada = ; 
	$slug = 'quadra';
?>
<a href="{{ route('editemodalidade', $slug ) }}">form edit</a>
