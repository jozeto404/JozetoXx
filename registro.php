<?php

require 'database.php';

$message = '';
echo "1";
if (!empty($_POST['email']) && !empty($_POST['password'])) {
	echo "2";
	$sql = "INSERT INTO Usuarios (email, password) VALUES (:email, :password)";
	echo "3";
	$stmt = $conn->prepare($sql);
	echo "4";
	$stmt->bindParam(':email', $_POST['email']);
	echo "5";
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	echo "6";
	$stmt->bindParam(':password', $password);
	echo "7";
	try {
		// Código que puede generar una excepción
		// ...
		// Lanzar una excepción manualmente
		$stmt->execute();
		// ...
	} catch (Exception $e) {
		// Capturar y manejar la excepción
		echo "Se ha producido una excepción: " . $e->getMessage();
	}
	
	
	echo "7.1";
	if ($stmt->execute()) {
		echo "8";
		$message = 'Successfully created new user';
	} else {
		echo "9";
		$message = 'Sorry there must have been an issue creating your account';
	}
	echo "10";
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="Iniciosesion.css">
	<title>Registro de Usuario Up Denim</title>
	<meta charset="UTF-8">


</head>

<body>

	<h1>Registro de Usuario UP DENIM</h1>

	<?php if (!empty($message)): ?>
		<p>
			<?= $message ?>
		</p>
	<?php endif; ?>
	<link rel="stylesheet" href="style.css">


	<div clas="Container">
		<form action="registro.php" method="post">
			<input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
			<input type="email" id="email" name="email" placeholder="Ingrese su correo" required
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
				title="Por favor ingrese una dirección de correo electrónico válida que contenga '.com'">

			<input type="password" id="password" name="password" placeholder="ingrese su contraseña" required>

			<input type="password" id="password" name="password2" placeholder="confirme su contraseña"
				pattern="[A-Z].{8,}[A-Z].{8,}"
				title="La contraseña debe contener al menos un número y una letra mayúscula, y tener al menos 8 caracteres">
			<input type="submit" value="Registrarse">
		</form>
	</div>
</body>

</html>