<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Abogados y Notarios Roldan</title>

        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/light-bootstrap-dashboard.css">
        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,700,300">
        <style>
            #animacion
            {
                transition-property: color, border-left;
                transition-duration: 0.25s;
                transition-timing-function: ease-out;
                -webkit-transition-property: color, border-left;
                -webkit-transition-duration: 0.25s;
                -o-transition-property: color, border-left;
                -o-transition-duration: 0.25s;
                border-left: 2px solid transparent;
                color: #1d1d1d;
            }
            #animacion:hover
            {
                transition-property: color, border-left;
                transition-duration: 0.25s;
                transition-timing-function: ease-out;
                -webkit-transition-property: color, border-left;
                -webkit-transition-duration: 0.25s;
                -o-transition-property: color, border-left;
                -o-transition-duration: 0.25s;
                border-left: 2px solid #42d0ed;
                color: #42d0ed;
            }
            #animacion:hover #listaAnimacion
            {
                display: block;
            }
            #listaAnimacion
            {
                display: none;
            }
            #listaAnimacion a
            {
                transition-property: color, border-left;
                transition-duration: 0.25s;
                transition-timing-function: ease-out;
                -webkit-transition-property: color, border-left;
                -webkit-transition-duration: 0.25s;
                -o-transition-property: color, border-left;
                -o-transition-duration: 0.25s;
                color: #42d0ed;
            }
            #listaAnimacion a:hover
            {
                transition-property: color, border-left;
                transition-duration: 0.25s;
                transition-timing-function: ease-out;
                -webkit-transition-property: color, border-left;
                -webkit-transition-duration: 0.25s;
                -o-transition-property: color, border-left;
                -o-transition-duration: 0.25s;
                color: #1d1d1d;
            }
            .btn-file {
                position: relative;
                overflow: hidden;
            }
            .btn-file input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                min-width: 100%;
                min-height: 100%;
                font-size: 100px;
                text-align: right;
                filter: alpha(opacity=0);
                opacity: 0;
                outline: none;
                background: white;
                cursor: inherit;
                display: block;
            }
        </style>
    </head>
    <body id="app-layout">
        <div class="wrapper">
            <div class="sidebar" data-color="blue" data-image="http://administrador.abogadosynotariosroldan.com/assets/img/sidebar-5.jpg">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="{{ url('/') }}" class="simple-text">
                            Administrador
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="{{ url('eventos') }}">
                                <i class="pe-7s-date"></i>
                                <p>Eventos</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('clientes') }}">
                                <i class="pe-7s-users"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('trabajadores') }}">
                                <i class="pe-7s-id"></i>
                                <p>Trabajadores</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('sedes') }}">
                                <i class="pe-7s-home"></i>
                                <p>Sedes</p>
                            </a>
                        </li>
@if (Auth::user()->tipo == 'administrador')
                        <li>
                            <a href="{{ url('usuarios') }}">
                                <i class="pe-7s-user"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
@endif
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                @yield('navleft')
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            {{ Auth::user()->username }}
                                            <b class="caret"></b>
                                      </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="{{ url('perfil/ver') }}"><i class="pe-7s-user"> </i> Perfil</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ url('logout') }}"><i class="pe-7s-power"></i> Cerrar Sesión</a></li>
                                      </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('contenido')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mensaje-modal" tabindex="-1" role="dialog" aria-labelledby="Acciones">
            <div class="modal-dialog" role="document" style="z-index: 1050;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="mensaje-modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        @yield('modalheader')
                    </div>
                    <div class="modal-body">
                        @yield('modalbody')
                    </div>
                    <div class="modal-footer">
                        @yield('modalfooter')
                    </div>
                </div>
            </div>
        </div>
        <script src="http://administrador.abogadosynotariosroldan.com/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="http://administrador.abogadosynotariosroldan.com/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="http://administrador.abogadosynotariosroldan.com/assets/js/bootstrap-checkbox-radio-switch.js" type="text/javascript"></script>
        <script src="http://administrador.abogadosynotariosroldan.com/assets/js/chartist.min.js" type="text/javascript"></script>
        <script src="http://administrador.abogadosynotariosroldan.com/assets/js/bootstrap-notify.js" type="text/javascript"></script>
        <script src="http://administrador.abogadosynotariosroldan.com/assets/js/light-bootstrap-dashboard.js" type="text/javascript"></script>
        <script type="text/javascript">
            function mostrarTodo()
            {
                document.getElementById('mas').style.display = 'block';
                document.getElementById('mostrar').style.display = 'none';
            }
            function crear_link(url)
            {
                var boton = document.getElementById('boton');
                var link = '<button type="button" data-dismiss="modal" class="btn btn-info"><i class="pe-7s-close"> </i>Cancelar</button>'
                link += '<a href="' + url+ '" class="btn btn-danger"><i class="pe-7s-trash"> </i> Eliminar</a>';
                boton.innerHTML = link;
            }
            $("#capa").hover(function(){
                $("#listaAnimacion").show();
            }, function(){
                $("#listaAnimacion").hide();
            });

        </script>
    </body>
</html>
