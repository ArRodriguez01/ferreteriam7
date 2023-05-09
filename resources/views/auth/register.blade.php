<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
	<h1>Registro</h1>
	<form action="{{ route('register') }}" method="POST">
		@csrf
		<label for="name">Nombre:</label>
		<input type="text" id="name" name="name"><br>
		<label for="email">Correo electrónico:</label>
		<input type="email" id="email" name="email"><br>
		<label for="password">Contraseña:</label>
		<input type="password" id="password" name="password"><br>
		<label for="password_confirmation">Confirmar contraseña:</label>
		<input type="password" id="password_confirmation" name="password_confirmation"><br>
		<input type="submit" value="Registrarse">
	</form>
</body>
</html>
