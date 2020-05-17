
<div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white" data-image="{{asset('assetsDashboard/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          {{Auth::user()->name}}
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item {{ Route::current()->getName() == 'dashboard' ? "active" : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  {{ Route::current()->getName() == 'dashboard.edit' ? "active" : '' }} ">
            <a class="nav-link" href="{{route('dashboard.edit', ["slugName" => Auth::user()->slug] )}}">
              <i class="material-icons">person</i>
              <p>Minha Conta</p>
            </a>
          </li>
          <li class="nav-item {{ Route::current()->getName() == 'seila123' ? "active" : '' }}">
            <a class="nav-link" href="{{ route('modalidade') }}">
          <i class="material-icons">Modalidade</i>
          <p>Modalidade</p>
        </a>
      </li>
      <li class="nav-item {{ Route::current()->getName() == 'seila1231' ? "active" : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="material-icons">Tag</i>
      <p>Tag</p>
    </a>
  </li>
  <li class="nav-item {{ Route::current()->getName() == 'seila12312' ? "active" : '' }}">
    <a class="nav-link" href="{{ route('sala') }}">
  <i class="material-icons">room</i>
  <p>Sala</p>
</a>
</li>
      <li class="nav-item {{ Route::current()->getName() == 'category' ? "active" : '' }}">
        <a class="nav-link" href="{{ route('category') }}">
      <i class="material-icons">category</i>
      <p>Categoria</p>
    </a>
  </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Administrador</p>
            </a>
            </a>
          </li>
        </ul>
      </div>
    </div>
