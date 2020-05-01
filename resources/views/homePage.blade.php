
se estiver logado, mostra opção de perfil
<br>
se não recomendo a tela de login
<a href="{{ route('login') }}">Login</a>
<br>
<a href="{{ route('dashboard') }}">painel de gerenciamento</a>

<div>conteudo da pagina principal</div>

	<br>
if (logado): 
<br>
	exbibe a lista das minhas salas que participo 
	<br>
	e depois listar todas as modalidades
	<br><br>

else: 
	<br>
	lista todas as modalidades

