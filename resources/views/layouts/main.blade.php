<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ricardo's Atelier</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Styles -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="shortcut icon" href="{{asset('images/icono.ico')}}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
    <!--select bootstrap-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>R</b>At</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Ricardo</b>'sAtelier</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                  <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">
                                    <div align="center">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>  
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel" style="height: 60px">
                    
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Tareas</li>
                        @if(Auth::user()->isAdmin())
                            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        @endif
                        <li><a href="{{url('orden')}}"><i class="fa fa-tasks"></i> <span>Ordenes</span></a></li>
                        <li><a href="{{url('pendiente')}}"><i class="fa fa-list-alt"></i> <span>Pendientes</span></a></li>
                        <li><a href="{{url('prueba')}}"><i class="fa fa-share"></i> <span>Pruebas</span></a></li>
                        @if(Auth::user()->isAdmin())
                            <li><a href="{{url('seguridad')}}"><i class="fa fa-user-plus"></i> <span>Sastres</span></a></li>
                        @endif
                        <li><a href="{{url('cliente')}}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                @yield('contenido')
            </section>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Versión</b> 1.2.0
            </div>
            <strong>Copyright &copy; 2018.</strong> Todos los Derechos Reservados.
        </footer>
    </div>


    <!-- Scripts 
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>-->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>-->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- iCheck 1.0.1 -->
    <script>
        $('#modal-pendiente').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget);
            var id = button.data('id_orden_trabajo');
            var estado = button.data('flag_estado');
            var modal = $(this);

            modal.find('.modal-body #cabecera').text('Actualización de estado para pedido '+id);
            modal.find('.modal-body #id_orden_trabajo').val(id);
        })
    </script>
    <script>
        $('#modal-orden').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget);
            var id = button.data('id_orden_trabajo');
            var estado = button.data('flag_estado');
            var modal = $(this);
            if(!estado)
                estado=0;
            var elemento=document.getElementById("proceso");
            switch(estado){
                case 2:
                    elemento.disabled = true;
                    document.getElementById("finalizado").checked = true;
                    break;
                default:
                    elemento.checked = true;
                    break;
            }      
            modal.find('.modal-body #cabecera').text('Actualización de estado para pedido '+id);
            modal.find('.modal-body #id_orden_trabajo').val(id);
            modal.find('.modal-body #estado').val(estado);
        })
    </script>
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- select bootstrap -->
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    @yield('scripts')
</body>
</html>