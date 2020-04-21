</p> Bem vindo {{  $user->name }} </p>

<form method="post" action="{{route('login.logout')}}" >
    @csrf
    <input type="submit" value="sair">
</form>

