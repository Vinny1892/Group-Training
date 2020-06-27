@extends('dashboard.layout.layout')
@section('content')
<style>
  button {
    border-color: none
  }

  .edit:link {
    color: initial
  }

  a {
    color: initial;
  }

  .edit:hover {
    color: goldenrod;
  }

  .delete:hover {
    color: red;
  }
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)

        <div class="alert alert-danger">
          <p>{{ $error }}</p>
        </div>

        @endforeach
        @endif
      </div>
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Tabela Geral do Sistema</h4>
            <p> total de registro do sistema </p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead>
                <th>Usuarios</th>
                <th>Categorias</th>
                <th>Modalidade</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{$usersTotal}}</td>
                  <td>{{$categorysTotal}}</td>
                  <td>{{$modalityTotal }}</td>
                </tr>
              </tbody>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Salas</h4>
            <p class="card-category">Salas Cadastradas </p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Apagar</th>
              </thead>
              <tbody>
                @foreach($allRooms as $sala)
                <tr>
                  <td>{{$sala->_id}}</td>
                  <td>{{$sala->name}}</td>
                  <td>{{$sala->description}}</td>
                  <td class="text-center">
                    <a class="edit" href="{{ route('editroom', ['slug' => $sala->slug])}}"><i class="material-icons">edit</i></a>
                  </td>
                  <td class="text-center">
                    <a class="delete" href="{{ route('deleteroom', [ 'slug' => $sala->slug ] ) }}"><i class="material-icons">close</i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Listagem Usuarios -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Usuarios</h4>
            <p>Usuarios Cadastrados </p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Apagar</th>
                <th class="text-center">Administrador</th>

              </thead>
              <tbody>
                @foreach($users as $key => $user)
                <tr>
                  <td>{{$key}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email }}</td>
                  <td class="text-center"><a href="{{ route('user.edit', ["slugName" => $user->slug]) }}" class="edit" href="id"><i class="material-icons">edit</i></a></td>
                  <td class="text-center"><a href="{{ route('user.delete', ["slugName" => $user->slug]) }}" class="delete"><i class="material-icons">close</i></a></td>
                  <td class="text-center">
                    <a href="{{ route('adminisse' , ["slugName" => $user->slug]) }}">
                      @if($user->role === "admin")
                      <i class="material-icons">lock_open</i>
                      @else
                      <i class="material-icons">lock</i>
                      @endif
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection