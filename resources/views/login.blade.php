<!DOCTYPE html>
<html>
<head>
    <title>Sistema Jb Soluciones</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="form">
    <p>Login</p>
    <form>
        <input type="text" name="Usuario" placeholder="Usuario">
        <input type="password" name="password" placeholder="password">
        <div class="options-01">
          <label class="remember-me"><input type="checkbox" name="">Recordar contraseña</label>
        </div>
        <a class="buttonlogin" href="/despacho">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aceptar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <p class="message"><a href="#">¿olvidaste tu contraseña?</a></p>
    </form>
    </div>
</body>
</html>