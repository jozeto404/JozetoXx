<?php
session_start();


if (isset($_SESSION['user_id'])) {
    header('Location: /JozetoXx');
}

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM Usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /JozetoXx");
    } else {
        $message = 'Perdon, esas credenciales no existen';
    }
}
?>
<html>

<head>
    <link rel="stylesheet" href="Iniciosesion1.css">
</head>

<body>
    
    <h1>Up Denim</h1>
    <?php if (!empty($message)): ?>
        <p>
            <?= $message ?>
        </p>
    <?php endif; ?>
    <form method="post" action="iniciarsesion.php">
        <input type="email" id="correoelectronico" name="email" placeholder="Enter uyour mail" required>
        <input type="password" id="contraseña" name="password" placeholder="Enter your password" required>
        <input class="login" type="submit" value="INGRESAR">
    </form>
    <div class="olvido">
 
    <a href="Olvido_su_contraseña.php" class="olvido-link">¿ Olvidaste tu contrase&ntilde;a ?</a>
    


    <a href="registro.php" class="link-derecha">Registrar usuario</a>
    </div>
    <div class="boton">
            <a href="index.php">
            <button>Volver Atras</button>
        </a>
</body>

</html>