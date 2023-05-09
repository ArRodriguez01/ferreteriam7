<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="{{ route('login') }}" method="POST">
		@csrf
		<label for="email">Correo electrónico:</label>
		<input type="email" id="email" name="email"><br>
		<label for="password">Contraseña:</label>
		<input type="password" id="password" name="password"><br>
		<input type="submit" value="Iniciar Sesión">
	</form>
</body>
</html>
