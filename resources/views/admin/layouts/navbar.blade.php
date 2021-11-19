<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('/admin') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('/') }}" class="nav-link">Front</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="ml-auto mr-2 navbar-nav">
    <li class="user user-menu">
      <!-- Menu Toggle Button -->
      <a href="#">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">管理者A様</span>
      </a>
    </li>
  </ul>
</nav>