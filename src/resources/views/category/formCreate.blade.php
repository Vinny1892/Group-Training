@extends('dashboard.layout.layout')
@section('content')
<style>
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
      <div class="col-md-8">
        @if (session('message'))
          <div class="alert alert-success">
            {{ session('message') }}
          </div>
        @endif
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title">Criar Categoria</h4>
            <p class="card-category">criar uma nova categoria</p>
          </div>
          <div class="card-body">   
            <form action="{{route('category.store')}}" method="POST">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nome</label>
                <input type="text" name="name" class="form-control"  placeholder="Nome Categoria">
                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Descrição</label>
                <textarea  class="form-control"  name="description" placeholder="Insira Descrição da Categoria"></textarea>
                </div>
              </div>
        
              <button type="submit" class="btn btn-success pull-right">Salvar Categoria</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
     
    </div>
  </div>



<!-- Listagem Categorias -->
<div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Categorias</h4>
        <p class="card-category">Categorias Cadastradas </p>
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
          @foreach($categorys as  $key => $category)
            <tr>
              <td>{{$key}}</td>
              <td>{{$category->name}}</td>
              <td>{{ $category->description }}</td>
            <td ><a class="edit" href="{{ route('dashboard')}}"><i class="material-icons">edit</i></a></td>
            <td><a class="delete" href="{{ route('dashboard') }}"><i class="material-icons">close</i></a></td>
            </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection