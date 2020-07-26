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
    <link rel="stylesheet" href="css/encabezado.css?v=<?php echo(rand()); ?>" />
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
          echo "<a href='vistas/tabla_asistencias.php'>Mis Conferencias</a>";
        }
        ?>
        <a href="vistas/nosotros.php">Acerca de nosotros</a>
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
      
      <section class="contenedor_T">

        <!--CODIGO PARA GENERAR LAS CONFERENCIAS DISPONIBLES-->
      <?php
        $queryVirtual = $db->connect()->prepare('SELECT * FROM virtual WHERE estado=1');
        $queryVirtual->execute();

        $queryPresencial = $db->connect()->prepare('SELECT *FROM presencial WHERE estado=1');
        $queryPresencial->execute();
        
        if($queryVirtual->rowCount()) {
          while ($dataV = $queryVirtual->fetch(PDO::FETCH_ASSOC)) {
            $idV = $dataV["id_virtual"]; 
      ?>
        
        
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
              <p>Plataforma: <?php echo $virtual->getPlataforma($idV);?></p>
              <a href="controlador_inscribirV.php?id=<?php echo $idV?>"><input type="submit" value="Inscribir" class="boton_inscribir"></a>          
            
          </div>

      <?php
          }
        } 
        if($queryPresencial->rowCount()) {
          while($dataP = $queryPresencial->fetch(PDO::FETCH_ASSOC)) {
            $idP = $dataP['id_presencial'];
      ?>
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
              <p>Lugar: <?php echo $presencial->getNombreLugarTabla($idP) . ", " .  $presencial->getUbicacionTabla($idP); ?></p>
              <a href="controlador_inscribirP.php?id=<?php echo $idP?>"><input type="submit" value="Inscribir" class="boton_inscribir"></a>          
            
          </div>
      <?php
          }
        }  
      ?>





      </section>
      <br>
      <br>
      <footer id="piepagina">
      <section id="obj-info" class="bg-dark">
        <div class="obj-content">
        <h5><span>| A</span>cerca de nosotros</h5>
        <ul>
            <li><a><i class="fas fa-phone-alt"></i>(52)8183294020</a></li>
            <li><a><i class="fas fa-envelope"></i></li>
            <a>abiamalberto.19@gmail.com</a>
            <br>
            <a>diegobenitez@live.com.mx</a>
            <br>
            <a>luznevg@gmail.com</a>
            <br>
            <a>ivan98fer@gmail.com</a>
            <br>
            <a>fridaantonio092@gmail.com</a>
            <br>
            <li><a href="https://www.uanl.mx/enlinea/"><i class="fas fa-desktop"></i>   Servicios en línea </a></li>
        </ul>
        </div>



        <div class="obj-content">
            <h5><span>| R</span>edes Sociales</h5>
            <ul>
              <li><a href="https://www.facebook.com/fime.oficial/">Facebook</a></li>
              <li><a href="https://www.instagram.com/fime.oficial/?hl=es-la">Instagram</a></li>
              <li><a href="https://twitter.com/fime_oficial?lang=es">Twitter</a></li>
              <li><a href="https://www.youtube.com/channel/UCfmQiSfgZ5cMDe-kAYplmww/featured">Youtube</a></li>

        </div>
        <div class="obj-content1">
  <ul>
    <a><img src="ima/Logos.png" alt="LogoUANL" > </a>
  </ul>
        </div>
      </section>
</footer>

    </main>
  </body>
</html>
