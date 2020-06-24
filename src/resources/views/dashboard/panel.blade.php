@extends('dashboard.layout.layout')
@section('content')
<style>
    button { border-color: none}
    .edit:link{color:initial}
    a{color: initial;}
    
    .edit:hover{
        color: goldenrod;
    }
    .delete:hover{
        color:red;
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
            
              <div class="alert alert-danger"> <p>{{ $error }}</p> </div>
            
          @endforeach
        @endif
        </div>
          
  <!-- Listagem Usuarios -->
  <div class="col-lg-6 ">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Usuarios</h4>
        <p >Usuarios  Cadastrados </p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover" >
          <thead class="text-primary">
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Apagar</th>
            <th>Administrador</th>

          </thead>
          <tbody>
          @foreach($users as  $key => $user)
            <tr>
              <td>{{$key}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email }}</td>
            <td ><a href="{{ route('user.edit', ["slugName" => $user->slug]) }}" class="edit" href="id" ><i  class="material-icons">edit</i></a></td>
            <td ><a href="{{ route('user.delete', ["slugName" => $user->slug]) }}" class="delete" ><i class="material-icons">close</i></a></td>
            <td><a href="{{ route('adminisse' , ["slugName" => $user->slug]) }}" >

                @if($user->role === "admin")
                <i class="material-icons">lock_open</i> 
                 @else
                 <i class="material-icons">lock</i>
                 @endif


                
                </a></td>
            </tr>
          @endforeach
          </tbody>
        </table>

       <div class="">
        <ul class="pagination justify-content-center">
          <li class="page-item {{ $users->currentPage() == 1 ? "disabled" : "" }}">
            <a class="page-link"  href="{{ $users->previousPageUrl() }}">Previous</a>
          </li>
          {{-- {{ $users->links() }} --}}
         @for($i=1 ; $i <= $users->lastPage(); $i++)

         
          <li class="page-item {{ $users->currentPage() == $i ? "active" : "" }}">
            <a class="page-link" href="{{ $users->url($i) }}"> 
              {{  $i }} 
              <span class="sr-only">(current)</span>
            </a>
          </li>
          {{-- <li class="page-item active">
            <span class="page-link">
              2
              <span class="sr-only">(current)</span>
            </span> 
          </li>--}}
          @endfor
      
          <li class="page-item {{ $users->currentPage() == $users->lastPage()  ? "disabled" : ""  }} ">
            <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
          </li>
        </ul>


       </div>


      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card">
  <div class="card-header card-header-primary">
    <h4 class="card-title">Tabela Geral do Sistema</h4>
    <p > total de registro do  sistema </p>
  </div>
  <div class="card-body table-responsive">
    <table class="table table-hover" >
      <thead class="text-primary">
        <th>Usuarios</th>
        <th>Categorias</th>
        <th>Modalidade</th>
        <th>Salas</th>
        
      </thead>
      <tbody>
        <tr>
          <td>{{$usersTotal}}</td>
          <td>{{$categorysTotal}}</td>
          <td>{{$modalityTotal }}</td>
        <td>{{ $roomsTotal}}</td>
        </tr>
      </tbody>
    </thead>
    </table>


   </div>


  </div>
  </div>
  </div>
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
          <h4 class="card-title">Salas</h4>
          <p class="card-category">Salas Cadastradas </p>
      </div>
      <div class="card-body table-responsive">
          <table class="table table-hover">
              <thead class="text-primary">
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Editar</th>
                  <th>Apagar</th>
              </thead>
              <tbody>
                  @foreach($allRooms as $sala)
                      <tr>
                          <td>{{$sala->_id}}</td>
                          <td>{{$sala->name}}</td>
                          <td>{{$sala->description}}</td>
                          <td >
                              <a class="edit" href="{{ route('editroom', ['slug' => $sala->slug])}}"><i class="material-icons">edit</i></a>
                          </td>
                          <td>
                              <a class="delete" 
                              href="{{ route('deleteroom', [ 'slug' => $sala->slug ] ) }}"><i class="material-icons">close</i></a>
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
</div>

<script>

  
</script>

@endsection