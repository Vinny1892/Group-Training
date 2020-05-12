@extends('dashboard.layout.layout')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                <input type="email" value="{{ $user->email}}" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Senha</label>
                <input type="password"  class="form-control" id="inputPassword4" placeholder="Insira Nova Senha">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName">Nome</label>
              <input type="text" value="{{ $user->name }}" class="form-control" id="Name" placeholder="Escreva seu nome">
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