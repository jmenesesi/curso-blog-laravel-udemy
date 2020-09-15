<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item ">
      <a href="{{ route('admin.home')}}" class="nav-link {{ request()->is('admin') ? 'active' : ''}}">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Inicio
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview {{ request()->is('admin/posts*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        {{-- <i class="nav-icon fas fa-eye"></i> --}}
        <p>
          Blog
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.posts.index')}}" class="nav-link {{ request()->is('admin/posts') ? 'active' : ''}}">
            <i class="far fa-eye nav-icon"></i>
            <p>Ver todos los posts</p>
          </a>
        </li>
        <li class="nav-item">
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
        </li>
      </ul>
    </li>
  </ul>
</nav>