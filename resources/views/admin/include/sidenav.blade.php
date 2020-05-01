<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manage
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route("admin.category.create") }}"><i class="fas fa-fw fa-plus"></i> Add Category</a>
            <a class="collapse-item" href="{{ route("admin.category.index") }}"><i class="fas fa-fw fa-wrench"></i> Manage Category</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Product</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route("admin.product.create") }}"><i class="fas fa-fw fa-plus"></i> Add Product</a>
            <a class="collapse-item" href="{{ route("admin.product.index") }}"><i class="fas fa-fw fa-wrench"></i> Manage Product</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slider" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-image"></i>
          <span>Image Slider</span>
        </a>
        <div id="slider" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.slider.create")}}"><i class="fas fa-fw fa-plus"></i> Add Slider Image</a>
            <a class="collapse-item" href="{{route("admin.slider.index")}}"><i class="fas fa-fw fa-wrench"></i> Manage Slider Image</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#promotion" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-gift"></i>
          <span>Promotion</span>
        </a>
        <div id="promotion" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.promotion.create")}}"><i class="fas fa-fw fa-plus"></i> Add Promotion</a>
            <a class="collapse-item" href=""><i class="fas fa-fw fa-wrench"></i> Manage Promotion</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#access" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-tools"></i>
          <span>Accesibility</span>
        </a>
        <div id="access" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.set-flash-sale-timer")}}"><i class="fas fa-fw fa-clock"></i> Set Flash Sale Timer</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Order & User Info
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Orders</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route("admin.order.index") }}"><i class="fas fa-fw fa-wrench"></i> Manage Order</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Restricted
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.users.create") }}">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>