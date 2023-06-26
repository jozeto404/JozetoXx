<?php
session_start();

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('update Usuarios set password = :password WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$records->bindParam(':password', $password);
    try {
        $records->execute();
        header('Location: iniciarsesion.php');
        exit;
	} catch (Exception $e) {
		// Capturar y manejar la excepción
		echo "Se ha producido una excepción: " . $e->getMessage();
	}
}
?>
<html>

<head>
    <link rel="stylesheet" href="Iniciosesion1.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="olvido.css">

</head>

<body>
    
    <h1>Recuperar Contraseña</h1>
    <?php if (!empty($message)): ?>
        <p>
            <?= $message ?>
        </p>
    <?php endif; ?>
    <form method="post" action="olvido_su_contraseña.php">
        <input type="email" id="correoelectronico" name="email" placeholder="Enter uyour mail" required>
        <input type="password" id="contraseña" name="password" placeholder="Enter your new password" required>
        <input class="login" type="submit" value="ACTUALIZAR">
    </form>
    <div class="olvido">
    </div>

    </div>
    <div> <div class="botones"> <a href="index.php"> 
    <button>Volver Atras</button> </a> 
</div> </div>
</body>

</html>