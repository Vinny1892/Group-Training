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
      <div class="col-md-12">
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
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title">{{$cardTitle}}</h4>
          <p class="card-category">{{ $cardDescription }}</p>
          </div>
          <div class="card-body"> 
            @if(isset($category))  
            <form action="{{route('category.update', ['category'=> $category->_id])}}" method="POST" id='formCategory'>
             @method("PUT"); 
            @else
            <form action="{{route('category.store')}}" method="POST" id='formCategory'>

            @endif
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6 pl-3 pr-3">
                  <label for="inputEmail4">Nome</label>
                <input type="text" name="name"  class="form-control" value="{{$category ? $category->name : old('name') }}" placeholder="Nome">
                </div>
                <div class="form-group col-md-6 pl-3 pr-3">
                  <label for="inputPassword4">Descrição</label>
                <textarea  class="form-control"  name="description" placeholder="Descrição da Categoria">{{$category ? $category->description : old('description') }}</textarea>
                </div>
              </div>
        
          <button type="submit" class="btn btn-success pull-right">{{ $category ? "Editar Categoria" : "Salvar Categoria"}}</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
     
    </div>
  </div>



<!-- Listagem Categorias -->
<div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Categorias</h4>
        <p class="card-category">Categorias Cadastradas </p>
      </div>
      <div class="card-body table-responsive">
      <?php if (sizeof($categorys) > 0) : ?>
        <table class="table table-hover" id='tableCategory'>
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
              <td>{{$category->description }}</td>
            <td ><a href="{{ route('category.edit', ["slugCategory" => $category->slug]) }}" class="edit" href="id" ><i  class="material-icons">edit</i></a></td>
            <td ><a href="{{route('category.delete', ["slugCategory" => $category->slug]) }}" class="delete" ><i class="material-icons">close</i></a></td>
            </tr>
          @endforeach
          </tbody>
        </table>

        <?php else : ?>
            <div class="col-lg-12 mt-3">
                <h5>Nenhuma categoria cadastrada ainda!</h5>
            </div> 
        <?php endif; ?>


      </div>
    </div>
  </div>
</div>
</div>
<script>

  
</script>

@endsection