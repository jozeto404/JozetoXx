<?php
session_start();
?>



<html>

<head>
  <title>UP DENIM</title>

  <link rel="stylesheet" href="style.css">

</head>

<body>

  <h1>Up Denim</h1>
  <?php if (!empty($_SESSION['user_id'])) : ?>

    <div class="INGRESAR"> 
      <a href="cerrarsesion.php">Cerrar Sesion</a>
      </div>
    <?php else : ?>
      <div class="INGRESAR">
        <a href="iniciarsesion.php">Ingresar</a>
        </div>

      <?php endif; ?>

      



      <div class="botones">
        <nav>
          <a href="error.html"> JEANS SKYNNY</a>
          <a href="Error500.html"> JOGGERS</a>
          <a href="updenimVentas.html"> JEANS OVERSIZE</a>
          <a href="Contactanos.html"> CONTACTANOS</a>
          <?php if (!empty($_SESSION['user_id'])) : ?>
            <a href="Contactanos.html"> Mi Perfil</a>
          <?php endif; ?>
        </nav>
        <h4>Comercializadora y frabricadora de Jeans tipo Skynny, Oversize, Dril Jogger y Buzo Hilo</h4>


        <h2>JEANS SKYNNY</h2>

        <img class="upimage" src="skynny.jpeg">
        <h5>Oversize</h5>
        <img class="upimg2" src="https://scontent.fbog14-1.fna.fbcdn.net/v/t39.30808-6/328958517_1667267440370515_8529925825162997887_n.jpg?stp=dst-jpg_p480x480&_nc_cat=102&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeEwXPO6K5EwIIFmn-I2glsd915r7FKGILj3XmvsUoYguFoVobnO508PHgMSkMMwqVKiBSINj6tL4Q1oAAIFSsZj&_nc_ohc=O5oWSjSDMKgAX80Fdy1&_nc_zt=23&_nc_ht=scontent.fbog14-1.fna&oh=00_AfB5vdTpNVN5fdbPcbSogSl0OrzPg14Za3i7UAbOWAAZhw&oe=641FE583">
        <h3>Buzo Hilo</h3>
        <img class="Buzohilo" src="https://scontent.fbog4-2.fna.fbcdn.net/v/t39.30808-6/287956595_582138286824521_2040251821420786200_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=a26aad&_nc_eui2=AeE1xor8sNUETkyAcjvQWMNv6WUQGx1T6A_pZRAbHVPoDz7CoCKDKDQC1wkPwgVLk3Ye9TnIFW2c8MWxm_yMjOtl&_nc_ohc=7auqabqEpjEAX_R5tAX&_nc_ht=scontent.fbog4-2.fna&oh=00_AfAesMqHPV0gq584ZVXss-aVfHZ-CUa8wndZsdZwdMXI7w&oe=64236A7A">




        <h2>Donde encontrarnos!</h2>
        <ul>
          <li> Carrera # 9-57 Local 345
        </ul>
</body>

</html>