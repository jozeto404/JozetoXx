<?php

require 'database.php';

$message = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$sql = "INSERT INTO Usuarios (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':email', $_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bindParam(':password', $password);
	try {
		if ($stmt->execute()) {
			$message = 'Successfully created new user';
		} else {
			$message = 'Sorry there must have been an issue creating your account';
		}
	} catch (Exception $e) {
		// Capturar y manejar la excepción
		echo "Se ha producido una excepción: " . $e->getMessage();
	}
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