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
      <div class="col-md-8">
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
            @if(isset($tag))  
             <form action="{{route('tag.update', ['tag'=> $tag->_id])}}" method="POST" id='formTag'> 
             @method("PUT"); 
            @else
             <form action="{{route('tag.store')}}" method="POST" id='formTag'> 

            @endif
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nome</label>
                <input type="text" name="name"  class="form-control" value="{{$tag ? $tag->name : old('name') }}" placeholder="Nome Tag">
                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Descrição</label>
                <textarea  class="form-control"  name="description" placeholder="Insira Descrição da Tag">{{$tag ? $tag->description : old('description') }}</textarea>
                </div>
              </div>
        
          <button type="submit" class="btn btn-success pull-right">{{ $tag ? "Editar Tag" : "Salvar Tag"}}</button>
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
        <h4 class="card-title">Tags</h4>
        <p>Tags Cadastradas </p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover" >
          <thead class="text-primary">
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Apagar</th>

          </thead>
          <tbody>
          @foreach($tags as  $key => $tag)
            <tr>
              <td>{{$key}}</td>
              <td>{{$tag->name}}</td>
              <td>{{$tag->description }}</td>
            <td ><a href="{{ route('tag.edit', ["slugTag" => $tag->slug]) }}" class="edit"  ><i  class="material-icons">edit</i></a></td>
            <td ><a href="{{ route('tag.delete', ["slugTag" => $tag->slug]) }}" class="delete" ><i class="material-icons">close</i></a></td> --}}
            </tr>
          @endforeach
          </tbody>
        </table>

       <div class="">
        <ul class="pagination justify-content-center">
          <li class="page-item {{ $tags->currentPage() == 1 ? "disabled" : "" }}">
            <a class="page-link"  href="{{ $tags->previousPageUrl() }}">Previous</a>
          </li>
          {{-- {{ $categorys->links() }} --}}
         @for($i=1 ; $i <= $tags->lastPage(); $i++)

         
          <li class="page-item {{ $tags->currentPage() == $i ? "active" : "" }}">
            <a class="page-link" href="{{ $tags->url($i) }}"> 
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
      
          <li class="page-item {{ $tags->currentPage() == $tags->lastPage()  ? "disabled" : ""  }} ">
            <a class="page-link" href="{{ $tags->nextPageUrl() }}">Next</a>
          </li>
        </ul>

      </nav>

       </div>


      </div>
    </div>
  </div>
</div>
</div>
<script>

  
</script>

@endsection