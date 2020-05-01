<div>conteudo da pagina principal</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
if (logado): 
<br>
	Mostra opção de perfil
	<br>
	e depois listar todas as modalidades
	<br>
	<a href="{{ route('dashboard') }}">painel de gerenciamento / dashboard</a>
	<br>
	exbibe a lista das minhas salas que participo 
	<a href="{{ route('listameuschats') }}">Lista meus CHATS</a>
	<br>
	<br>
else: 
	<br>
	<a href="{{ route('login') }}">Login</a>
	<br>
	lista todas as modalidades

