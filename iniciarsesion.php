<?php
session_start();


if (isset($_SESSION['user_id'])) {
    header('Location: /JozetoXx');
}

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM Usuarios WHERE email = :email');
    echo "1";
    $records->bindParam(':email', $_POST['email']);
    echo "2";
    $records->execute();
    echo "3";
    $results = $records->fetch(PDO::FETCH_ASSOC);
    echo "4";
    $message = '';
    echo strlen($results);

    if (strlen($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        echo "5.1";
        $_SESSION['user_id'] = $results['id'];
        echo "5.2";
        header("Location: /JozetoXx");
    } else {
        echo "5.3";
        $message = 'Perdon, esas credenciales no existen';
    }
    echo "6";
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
 
    <a href="Olvido su contraseña.html" class="olvido-link">¿ Olvidaste tu contrase&ntilde;a ?</a>
    


    <a href="registro.php" class="link-derecha">Registrar usuario</a>
    </div>
</body>

</html>