
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
  


  <title>HavendWell</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css'/>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css'/>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->email }} <span class="caret"></span>
            </a>
           
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <div class="text-center">
                    @if(Auth::user()->photo == NULL)
                    <div class="pl-2">
                        <img src="{{ asset('img/profile/profile.png') }}" class="img-circle elevation-2 w-75" alt="User Image">
                    </div>
                    @else
                    <div class="pl-2">
                        <img src="{{ asset('img/profile/'.Auth::user()->photo) }}" class="img-circle elevation-2 w-75" alt="User Image">
                    </div>
                    @endif
                </div>
                <div class="container mt-2">
                  <div class="row">
                    <div class="col-md-7">
                        <button class="btn btn-primary">
                            <router-link to="editProfile" class="text-white">
                                Edit Profile
                            </router-link>
                        
                        </button>
                    </div>
                    <div class="col-md-5  ">
                        <button onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="btn btn-danger">
                          Logout
                        </button>
                     
                    </div>
                  </div>
                </div>
             
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
     
         
    </ul>
  </nav>
      
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link p-4">
      <img src="{{ asset('img/sampleLogo.png') }}" alt="AdminLTE Logo" class="img-fluid"
           style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if(Auth::user()->photo == NULL)
        <div class="pl-2">
            <img src="{{ asset('img/profile/profile.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        @else
        <div class="pl-2">
            <img src="{{ asset('img/profile/'.Auth::user()->photo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        @endif
       
        <div class="info">
          <a href="#" class="d-block text-capitalize">{{ Auth::user()->firstname." ".Auth::user()->lastname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <router-link to="dashboard" class="nav-link">
                        <i class="fas fa-tachometer-alt  nav-icon"></i>
                    <p>
                        Dashboard 
                    </p>
                    </router-link>
                </li>

                <li class="nav-item">
                  <router-link to="user" class="nav-link">
                      <i class="fas fa-users  nav-icon"></i>
                  <p>
                      Users
                  </p>
                  </router-link>
                </li>

                <li class="nav-item">
                <router-link to="activity" class="nav-link">
                  <i class="fas fa-bell nav-icon"></i>
                    <p>
                      Activity Log 
                    </p>
                </router-link>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-bed nav-icon"></i>
                      <p>
                        Rooms
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <router-link to="rooms" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Branch 1</p>
                        </a>
                        </router-link>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Branch 2</p>
                        </a>
                      </li>
                    </ul>
                </li>

                <li class="nav-item">
                  <router-link to="amenities" class="nav-link">
                      <i class="fas fa-align-center nav-icon"></i>
                 
                          Amenities
                      </router-link>
                  </a>
                </li>

                <li class="nav-item">
                  <router-link to="reserved" class="nav-link">
                      <i class="fas fa-file-invoice  nav-icon "></i>
                    Reservation
                  </router-link>
                </li>

                <li class="nav-item">
                  <router-link to="report" class="nav-link">
                      <i class="fas fa-file-alt nav-icon"></i>
                      <p>
                      Report
                      </p>
                  </router-link>
                </li>
                
               
                <li class="nav-item">
                  <router-link to="contactMe" class="nav-link">
                      <i class="fas fa-file-alt nav-icon"></i>
                  @if($messageCount > 0)
                  <p>
                    Message <span class=" right"> {{ $messageCount }}<i class="fa fa-envelope text-primary" aria-hidden="true"></i></span>
                  </p>
                  @else
                  <p>
                  Message <span class=" right"><i class="fa fa-envelope-open text-primary" aria-hidden="true"></i></span>
                  </p>
                  @endif

                 
                
                  </router-link>
                </li>


                
                {{-- <li class="nav-item">
                  <router-link to="report" class="nav-link">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                      <p>
                      Developer
                      </p>
                  </router-link>
                </li> --}}

                
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-5">
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <router-view></router-view>
            <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Naotech Incorporated</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js'></script>

<script>
</script>
</body>
</html>
