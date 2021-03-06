<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Admin Portal</title>

<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app"> 
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" @keyup ="searchit" v-model="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="./images/kushi_farms_logo_2.png" alt="KushiFarms Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">Kushi Farms</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="/profile" class="d-block">
            <img src="./images/profilePics/{{Auth::user()->photo}}" class="img-circle elevation-2" alt="User Image">
          </a>
        </div>
        <div class="info">
          <a href="/profile" class="d-block">
          {{Auth::user()->firstname}}
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

              {{-- listing the different options to appear on the sidebar menu --}}
            <li class="nav-item">
              {{-- router links using vue router to navigate the route --}}
              <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt green"></i>
                <p>
                  Dashboard
                </p> 
              </router-link>
            </li>

            @cannot('isUser')
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-stream green"></i>
                <p>
                  Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/orders" class="nav-link ">
                    <i class="fas fa-shopping-cart orange"></i>
                    <p>Orders</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/sales" class="nav-link ">
                    <i class="fas fa-money-bill-alt orange"></i>
                    <p>
                      Sales
                    </p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/stock" class="nav-link">
                    <i class="nav-icon fas fa-cubes orange"></i>
                    <p>
                      Stock
                    </p>  
                  </router-link>
                </li>             
              </ul>
            </li>
            @cannot('isAuthor')
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog green"></i>
                <p>
                  Settings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/inventory" class="nav-link">
                    <i class="nav-icon fas fa-dolly-flatbed orange"></i>
                    <p>
                      Inventory 
                    </p>  
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/users" class="nav-link ">
                    <i class="nav-icon fas fa-users orange"></i>
                    <p>Users</p>
                  </router-link>
                </li>   
              </ul>
            </li>
            @endcannot            
            @endcan
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-power-off red"></i>
                <p>
                  {{ __('Logout') }}
                </p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        
        {{-- </ul> --}}
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        {{-- displays the view specied by the router link on the same page --}}
      <router-view></router-view>
      {{-- shows the progress bar  --}}
      <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
</div>
<!-- ./wrapper -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth
{{-- using the local js file  --}}
<script src="/js/app.js"></script>
</body>
</html>
