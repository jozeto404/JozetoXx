<!-- archivo.php  -->
<?php
if (isset($_POST['submit'])) {
    // Procesa tus datos y realiza las operaciones necesarias aquí
    
    // Genera el código JavaScript para mostrar el mensaje emergente
    echo '<script type="text/javascript">
            alert("¡Mensaje emergente en PHP!");
          </script>';
}
?>