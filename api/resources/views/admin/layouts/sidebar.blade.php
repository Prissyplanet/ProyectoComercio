<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Logo de la tienda -->
  <a href="/" class="brand-link">
    <img src="ruta/a/tu/logo.png" alt="Logo de Echoes" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Echoes</span>
  </a>

  <!-- Barra lateral -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="ruta/a/imagen/usuario.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Administrador</a>
      </div>
    </div>

    <!-- Menú de navegación -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Productos -->
        <li class="nav-item">
          <a href="{{ route('admin.products.index') }}" class="nav-link">
            <i class="nav-icon fas fa-box"></i>
            <p>Productos</p>
          </a>
        </li>

        <!-- Categorías -->
        <li class="nav-item">
          <a href="{{ route('admin.categories.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Categorías</p>
          </a>
        </li>

        <!-- Marcas -->
        <li class="nav-item">
          <a href="{{ route('admin.brands.index') }}" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Marcas</p>
          </a>
        </li>

        <!-- Comentarios -->
        <li class="nav-item">
          <a href="{{ route('admin.comments.index') }}" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
            <p>Comentarios</p>
          </a>
        </li>

        <!-- Favoritos -->
        <li class="nav-item">
          <a href="{{ route('admin.favorites.index') }}" class="nav-link">
            <i class="nav-icon fas fa-heart"></i>
            <p>Favoritos</p>
          </a>
        </li>

        <!-- Usuarios -->
        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuarios</p>
          </a>
        </li>

        <!-- Cerrar sesión -->
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Cerrar sesión</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
