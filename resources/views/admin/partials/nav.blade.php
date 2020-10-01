<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item {{ setActiveRoute('pages.home') }}">
      <a href="{{ route('admin.home')}}" class="nav-link {{ request()->is('admin') ? 'active' : ''}}">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Inicio
        </p>
      </a>
    </li>
    @can('view', new App\Post)
    <li class="nav-item has-treeview {{ request()->is('admin/posts*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-paragraph"></i>
        <p>
          Blog
          <i class="right fas fa-angle-right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item {{ setActiveRoute('admin.posts.index') }}">
          <a href="{{ route('admin.posts.index')}}" class="nav-link {{ request()->is('admin/posts') ? 'active' : ''}}">
            <i class="far fa-eye nav-icon"></i>
            <p>Ver todos los posts</p>
          </a>
        </li>
        <li class="nav-item">
          @can('create', new App\Post)
            @if(request()->is('admin/posts/*'))
            <a href="{{ route('admin.posts.index', '#create') }}" class="nav-link">
              <i class="far fa-edit nav-icon"></i>
              <p>Crear un posts</p>
            </a>
            @else
              <a href="#" class="nav-link"  data-toggle="modal" data-target="#newPostModal">
                <i class="far fa-edit nav-icon"></i>
                <p>Crear un posts</p>
              </a>
            @endif
          @endcan
        </li>
      </ul>
    </li>
    @endcan
    @can('view', new App\User)
    <li class="nav-item has-treeview {{ request()->is('admin/users*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Usuarios
          <i class="right fas fa-angle-right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item {{ setActiveRoute('admin.users.index') }}">
          <a href="{{ route('admin.users.index')}}" class="nav-link {{ setActiveRoute('admin.users.index') }}">
            <i class="far fa-eye nav-icon"></i>
            <p>Ver todos los usuarios</p>
          </a>
        </li>
        <li class="nav-item {{ setActiveRoute('admin.users.create') }}">
          <a href="{{ route('admin.users.create') }}" class="nav-link {{ setActiveRoute('admin.users.create') }}">
            <i class="fa fa-plus nav-icon"></i>
            <p>Agregar usuario</p>
          </a>
        </li>
      </ul>
    </li>
    @endcan
    @can('view', new Spatie\Permission\Models\Role)
    <li class="nav-item has-treeview {{ request()->is('admin/roles*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>
          Roles
          <i class="right fas fa-angle-right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item {{ setActiveRoute('admin.roles.index') }}">
          <a href="{{ route('admin.roles.index')}}" class="nav-link {{ setActiveRoute('admin.roles.index') }}">
            <i class="far fa-eye nav-icon"></i>
            <p>Ver todos los roles</p>
          </a>
        </li>
        <li class="nav-item {{ setActiveRoute('admin.roles.create') }}">
          <a href="{{ route('admin.roles.create') }}" class="nav-link {{ setActiveRoute('admin.roles.create') }}">
            <i class="fa fa-plus nav-icon"></i>
            <p>Agregar rol</p>
          </a>
        </li>
      </ul>
    </li>
    @endcan
    @can('view', new Spatie\Permission\Models\Permission)
    <li class="nav-item {{ setActiveRoute('admin.permissions.index') }}">
      <a href="{{ route('admin.permissions.index')}}" class="nav-link {{ setActiveRoute('admin.permissions.index') }}">
        <i class="nav-icon fas fa-user-lock"></i>
        <p>
          Permisos
          
        </p>
      </a>
    </li>
    @endcan
  </ul>
</nav>