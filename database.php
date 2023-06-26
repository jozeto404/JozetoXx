<!-- archivo.php  -->
<?php
$server= 'localhost:3307';
$username = 'root';
$password = '';
$database = 'SIUD';


$conn = mysqli_connect($servername, $username, $password, $database);

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e){
    die('Connection Failed:' . $e->getMessage());
} 
?>  