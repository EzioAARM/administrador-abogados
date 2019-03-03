<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Administrador - Abogados y Notarios Roldan</title>
        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/light-bootstrap-dashboard.css">
        <link rel="stylesheet" type="text/css" href="http://administrador.abogadosynotariosroldan.com/assets/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,700,300">
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <br>
            <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                <h2 class="form-signin-heading">Inicie Sesión</h2>
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="sr-only">Nombre de Usuario</label>
                    
                    <div>
                        <input id="username" type="text" class="form-control" placeholder="Nombre de usuario" name="username" value="{{ old('username') }}">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="sr-only">Contraseña</label>

                    <div>
                        <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Recordarme
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Iniciar Sesión
                        </button>

                    </div>
                </div>
            </form>
        </div>
        <script src="./assets/js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./assets/js/bootstrap-checkbox-radio-switch.js"></script>
        <script src="./assets/js/chartist.min.js"></script>
        <script src="./assets/js/bootstrap-notify.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="./assets/js/light-bootstrap-dashboard.js"></script>
    </body>
</html>