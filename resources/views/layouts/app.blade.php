<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>@yield('title') </title>
  
    <!-- Bootstrap -->
    <link href="{{ asset('static/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('static/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('static/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('static/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    @section('head')

    @show
   
    <!-- Custom Theme Style -->
    <link href="{{ asset('static/build/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
  </head>

  <body class="nav-md">
    <div class="container body">

      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/despacho" class="site_title"> 
              <img src="{{ asset('static/images/Icono.bmp') }}" alt="..." style="width: 24%; height: 64%; margin-right: 3%;" >
              <span>JB Soluciones</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('static/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Movimientos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/movimientos/tareas">Control de Tareas</a></li>
                      <li><a href="/movimientos/agenda">Agenda Corporativa</a></li>
                      <li><a href="/movimientos/diligencias">Control de Diligencias</a></li>
                      <li><a href="/movimientos/facturas">Facturación</a></li>
                      <li><a href="/movimientos/cobranza">Cobranza</a></li>
                      <li><a href="index3.html">Avances Contables</a></li>
                      <li><a href="index3.html">Horario Semanal</a></li>
                      <li><a href="index3.html">Liquidacion</a></li>
                      <li><a href="index3.html">Gastos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Catalogos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">Clientes</a></li>
                      <li><a href="form_advanced.html">Otros clientes</a></li>
                      <li><a href="form_validation.html">Obligaciones</a></li>
                      <li><a href="form_wizards.html">Licencias</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Herramientas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Respaldo</a></li>
                      <li><a href="media_gallery.html">Recuperacion</a></li>
                      <li><a href="typography.html">Depuracion</a></li>
                      <li><a href="icons.html">Tareas Contables</a></li>
                      <li><a href="glyphicons.html">Auxiliares VS Clientes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Empresas</a></li>
                      <li><a href="tables_dynamic.html">Usuarios</a></li>
                      <li><a href="tables_dynamic.html">Perfiles</a></li>
                      <li><a href="tables_dynamic.html">Folios</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Otros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Ayuda</a></li>
                      <li><a href="chartjs2.html">Creditos</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
      
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('static/images/img.jpg') }}" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="/"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('static/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">60 días ago</span>
                        </span>
                        <span class="message">
                         Entrega de reportes trimestral...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('static/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">50 días sep</span>
                        </span>
                        <span class="message">
                          Reporte de clientes concluidos...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('static/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">30 días Oct</span>
                        </span>
                        <span class="message">
                          Pendiente contabilidad uno...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('static/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 seg Nov</span>
                        </span>
                        <span class="message">
                        Pendiente cierre del mes cliente xxxxx ...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
      
        <!-- container -->
        <div id="app">
        @yield('content')
        </div>
        <!-- end container -->
         
         <!-- footer content -->
         <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div> 
    <div class="loader" style="display: none;"></div>
    @section('appvue')
    
    @show
    <!-- jQuery -->
    <script src="{{ asset('static/vendors/jquery/dist/jquery.min.js') }}"></script>
  
    <!-- Bootstrap -->
    <script src="{{ asset('static/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  
    <!-- FastClick -->
    <script src="{{ asset('static/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('static/vendors/nprogress/nprogress.js') }}"></script>
   
    <!-- DateJS -->
    <script src="{{ asset('static/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('static/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('static/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    @section('footer')
    
    @show
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('static/build/js/custom.js') }}"></script>
     
 
  </body>
</html>