@extends('dashboard.layout.layout')
@section('content')
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
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('user.update', ['user' => $user->_id]) }}" >
              @csrf
              @method('PUT')
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Email</label>
                  <input type="email" value="{{ $user->email }}" class="form-control" name="email" placeholder="Email"/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Senha</label>
                <input type="password"  class="form-control" name="password" placeholder="Insira Nova Senha" >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Confirmação Senha</label>
                <input type="password"  class="form-control" name="password_confirmation" placeholder="Atualizar Senha">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName">Nome</label>
              <input type="text" value="{{ $user->name }}" class="form-control" name="name" placeholder="Escreva seu nome">
              </div>
              <button type="submit" class="btn btn-success pull-right">Atualizar Credenciais</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
    
@endsection