<?php
include_once 'include/db.php';
include_once 'include/presencial.php';
include_once 'include/virtual.php';
$db = new DB();
$presencial = new Presencial();
$virtual = new Virtual();
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
    <link rel="stylesheet" href="css/tabla.css?v=<?php echo(rand()); ?>" />
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
          echo "<a href='controlador_asistencia.php'>Mis Conferencias</a>";
        }
        
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
        <h2>Bienvenido/a <?php

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

        $queryPresencial = $db->connect()->prepare('SELECT *FROM presencial WHERE estado=1');
        $queryPresencial->execute();
        
        if($queryVirtual->rowCount()) {
          while ($dataV = $queryVirtual->fetch(PDO::FETCH_ASSOC)) { 
      ?>
        
        <div class="contenedor_2">
          <div class="tarjetas">

              <img src="ima/cubero.jpg">
            
              <h4><?php echo $dataV["titulo"]; ?></h4>
              <p><?php echo "(" . $dataV["tipo"] . ")";?></p>
              <br>
              <p>Expositor: <?php echo $dataV["expositor"]; ?></p>
              <br>
              <p><?php echo $dataV["descripcion"]; ?></p>
              <br>
              <p>Fecha: <?php echo $dataV["fecha_inicio"]; ?></p>
              <br>
              <p>Hora: <?php echo $dataV["hora_inicio"]; ?></p>
              <br>
              <p>Plataforma: <?php echo $virtual->getPlataforma($dataV["titulo"]);?></p>
              <a href="#"><input  class="boton_inscribir"  type="submit" value="Inscribir" class="#"></a>           
            
          </div>

      <?php
          }
        } 
        if($queryPresencial->rowCount()) {
          while($dataP = $queryPresencial->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="contenedor_2">
          <div class="tarjetas">

              <img src="ima/cubero.jpg">
            
              <h4><?php echo $dataP["titulo"]; ?></h4>
              <p><?php echo "(" . $dataP["tipo"] . ")";?></p>
              <br>
              <p>Expositor: <?php echo $dataP["expositor"]; ?></p>
              <br>
              <p><?php echo $dataP["descripcion"]; ?></p>
              <br>
              <p>Fecha: <?php echo $dataP["fecha_inicio"]; ?></p>
              <br>
              <p>Hora: <?php echo $dataP["hora_inicio"]; ?></p>
              <br>
              <p>Lugar: <?php echo $presencial->getNombreLugar($dataP["titulo"]) . ", " .  $presencial->getUbicacion($dataP["titulo"]); ?></p>
              <a href="#"><input  class="boton_inscribir"  type="submit" value="Inscribir" class="#"></a>           
            
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
