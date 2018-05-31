<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        
        <link rel="stylesheet" href="css/normalize.css">
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
        <?php 
            //carga los archivos de forma condicional
            $archivo = basename($_SERVER['PHP_SELF']);
            $pagina = str_replace(".php","",$archivo);
            if ($pagina == 'invitados' || $pagina == 'index') {
              echo '<link rel="stylesheet" href="css\colorbox.css">';
            } else if($pagina == 'conferencia') {
              echo '<link rel="stylesheet" href="css\lightbox.css">';
            }
        ?>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body class="<?php echo $pagina; ?>"> 
      <header class="site-header">
        <div class="hero">
          <div class="contenido-header">
            <nav class="redes-sociales">
              <a href="http:\\www.facebook.com"><i class="fab fa-facebook-f"></i></a>
              <a href="http:\\www.twitter.com"><i class="fab fa-twitter"></i></a>
              <a href="http:\\www.pinterest.com"><i class="fab fa-pinterest"></i></a>
              <a href="http:\\www.youtube.com.ar"><i class="fab fa-youtube"></i></a>
              <a href="http:\\www.instagram.com"><i class="fab fa-instagram"></i></a>
            </nav> <!-- nav.redes-sociales -->
            <div class="informacion-evento clearfix">
              <div class="clearfix">
                <p class="fecha"><i class="far fa-calendar-alt"></i>10-12 Abril</p>
                <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Guadalajara, MX</p>
              </div> <!-- .clearfix -->
              <h1 class="nombre-sitio">GdlWebCamp</h1>
              <p class="slogan">La mejor conferencia de <span>Diseño Web</span> </p>
            </div> <!-- .informacion-evento -->
          </div> <!-- -contenido-header -->
        </div> <!-- .hero -->
      </header>
      <div class="barra">
        <div class="contenedor clearfix">
          <div class="logo">
          <a href="index.php"><img src="img/logo.svg" alt="imagen logo"></a>
          </div> <!-- .logo -->
          <div class="menu-movi">
            <span></span>
            <span></span>
            <span></span>
          </div> <!-- .menu-movi -->
          <nav class="navegacion-principal clearfix">
            <a href="conferencia.php">Conferencia</a>
            <a href="calendario.php">Calendario</a>
            <a href="invitados.php">Invitados</a>
            <a href="registro.php">Reservaciones</a>
          </nav>
        </div> <!-- .contenedor -->
      </div> <!-- .barra -->
      