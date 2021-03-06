
  <!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
      <title>Formulario Login</title>

      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
      <link rel="stylesheet" href="css/registre.css">
      <link href="image/favicon_logo.ico" rel="icon">
    </head>

<body>

<div class="container-fluid">

  <div class="my-image" >
        <img src="image/registre.jpg" >
  </div>

  <div class="my-content" >
    @if(Session::has('message'))
        <div class="alert alert-danger">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="col-sm-12  mytitle" >
        <h1>FORMULARIO DE REGISTRO</h1>
    </div>
    <div>
    <div class="row">
        <div class="col-sm-9 ">
          <div class="myform-bottom">
            <fieldset>
                    <form role="form" class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <input id="name" type="text" class="form-control" name="name"
                              placeholder="Nombres..." value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">

                            <input id="lastname" type="text" class="form-control" name="lastname"
                            placeholder="Apellidos..." value="{{ old('lastname') }}" required autofocus>

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">

                            <input id="dni" type="text" class="form-control" name="dni"
                            placeholder="DNI..." value="{{ old('dni') }}" required autofocus>

                            @if ($errors->has('dni'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input id="email" type="email" class="form-control" name="email"
                            placeholder="Correo..." value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                            <input id="username" type="text" class="form-control" name="username"
                            placeholder="Usuario..." value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="password" type="password" class="form-control"
                            placeholder="Contraseña..." name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">

                            <input id="password-confirm" type="password" class="form-control"
                            placeholder="Confirma contraseña..." name="password_confirmation" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('nombrenegocio') ? ' has-error' : '' }}">

                            <input id="nombrenegocio" type="text" class="form-control"
                            placeholder="Nombre de negocio..." name="nombrenegocio" required>

                            @if ($errors->has('nombrenegocio'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombrenegocio') }}</strong>
                                </span>
                            @endif

                        </div>
                       
                        <div class="my-formulario">
                            <input type="radio" name="tipo_negocio" id="solo-prod" value="bodega">
                            <label for="solo-prod">Bodega </label><br>
                            <input type="radio" name="tipo_negocio" id="ser-prod" value="bodega">
                            <label for="ser-prod">Libreria</label>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="mybtn">
                                    Registrarme
                                </button>
                            </div>
                        </div>

                    </form>
                    
                    <a href="{{ url('/') }}">volver</a>

                </fieldset>
            </div>
        </div>
    </div>
  </div>
</div>
</div>

</body>

</html>
