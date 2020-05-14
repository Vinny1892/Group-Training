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
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title">Criar Categoria</h4>
            <p class="card-category">criar uma nova categoria</p>
          </div>
          <div class="card-body">   
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nome</label>
                <input type="text" value="" class="form-control"  placeholder="Nome Categoria">
                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Descrição</label>
                <textarea  class="form-control" placeholder="Insira Descrição da Categoria"></textarea>
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
            <th>Country</th>
            <th>Editar</th>
            <th>Apagar</th>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Dakota Rice</td>
              <td>$36,738</td>
              <td>Niger</td>
            <td ><a class="edit" href="{{ route('dashboard')}}"><i class="material-icons">edit</i></a></td>
            <td><a class="delete" href="{{ route('dashboard') }}"><i class="material-icons">close</i></a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Minerva Hooper</td>
              <td>$23,789</td>
              <td>Curaçao</td>
              <td ><a class="edit" href="{{ route('dashboard')}}"><i class="material-icons">edit</i></a></td>
              <td><a class="delete" href="{{ route('dashboard') }}"><i class="material-icons">close</i></a></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Sage Rodriguez</td>
              <td>$56,142</td>
              <td>Netherlands</td>
              <td ><a class="edit" href="{{ route('dashboard')}}"><i class="material-icons">edit</i></a></td>
              <td><a class="delete" href="{{ route('dashboard') }}"><i class="material-icons">close</i></a></td>
            </tr>
            <tr>
              <td>4</td>
              <td>Philip Chaney</td>
              <td>$38,735</td>
              <td>Korea, South</td>
              <td ><a class="edit" href="{{ route('dashboard')}}"><i class="material-icons">edit</i></a></td>
              <td><a class="delete" href="{{ route('dashboard') }}"><i class="material-icons">close</i></a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection