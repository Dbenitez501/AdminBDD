<?php
include_once 'include/db.php';
$db = new DB();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>     
    <link rel="stylesheet" href="css/fontello.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/estilos.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/menu.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/banner.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/blog.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/tarjetas.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/inicio_seccion.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css?v=<?php echo(rand()); ?>" />

  </head>
  <body>
    <!--encabezado-->
    <header>
    <div class="contenedor">
      <a><h1>FIME</h1></a>
      <input type="checkbox" id="menu-bar">
      <label class="icon-menu" for="menu-bar"></label>
      <nav class="menu">
        <?php
        if(!isset($_SESSION['user'])) {
          //echo "<a href='index.php'> Inicio de sesión </a>";
          echo "<a href='controlador.php'> Inicio de sesión </a>";
        }
        ?>
        <a href="https://www.fime.uanl.mx/">FIME</a>
        <?php
        
          if(isset($_SESSION['user'])) {
            echo "<a href='include/logout.php'>Cerrar Sesión</a>";
          }
        
        ?>
      </nav>
    </div>
    </header>
    <!--encabezado-->


    <main>
      <section id="banner">
        <img src='ima/fime.jpg'>        
        <div class="contenedor">
          <h2>Conferencias</h2>
          <p>Apuntate para alguna conferencia</p>
        </div>
      </section>

      <section id="Bienvenidos">
        <h2>Bienvenido <?php

        if(isset($_SESSION['user'])) {
          echo $user->getNombre();
          echo "<br>";
          echo $user->getTipo();
        } else {
          echo "";
        }

        ?></h2>
        <h2>Estas son las conferencias disponibles</h2>
      </section>
      
      <section class="contenedor">

        <!--CODIGO PARA GENERAR LAS CONFERENCIAS DISPONIBLES-->
      <?php
        $queryVirtual = $db->connect()->prepare('SELECT * FROM virtual WHERE estado=1');
        $queryVirtual->execute();
        
        if($queryVirtual->rowCount()) {
          while ($dataV = $queryVirtual->fetch(PDO::FETCH_ASSOC)) { 
      ?>
        
        <div class="contenedor_2">

          <div class="tarjetas">

              <img src='ima/persona.jpg'>
            
              <h4><?php echo $dataV["titulo"]; ?></h4>
              <br>
              <p><?php echo $dataV["expositor"]; ?></p>
              <br>
              <p><?php echo $dataV["descripcion"]; ?></p>
              <br>
              <p>Fecha: <?php echo $dataV["fecha_inicio"]; ?></p>
              <br>
              <p>Hora: <?php echo $dataV["hora_inicio"]; ?></p>
              <a href="#">Incribir Conferencia</a>            
            
          </div>

      <?php
          }
        }  
        ?>

        </div>
      </section>
      <br>
      <br>

      <footer id="redes">
        <div class="contenedor">
          <div class="sociales">
            <img align='right' src='ima/Logos.png'>
          </div>
        </div>
      </footer>

    </main>
  </body>
</html>
