<?php
include_once '../include/db.php';
include_once '../include/presencial.php';
include_once '../include/virtual.php';
include_once '../include/user.php';
include_once '../include/user_session.php';
$db = new DB();
$presencial = new Presencial();
$virtual = new Virtual();
$userSession = new UserSession();
$user = new User();

$idUser;

if(isset($_SESSION['user'])) {
  $user->setUser($userSession->getCurrentUser());
  $idUser = $user->getIdUsu();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>

    <link rel="stylesheet" href="../css/fontello.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/estilos.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/menu.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/banner.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/blog.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/tarjetas.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/inicio_seccion.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/encabezado.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/nosotros.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css?v=<?php echo(rand()); ?>" />
    
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    
    
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
          echo "<a href='../controlador.php'> Inicio de sesión </a>";
        }
        ?>
        <?php
        if(!isset($_SESSION['user'])) {
          //echo "<a href='index.php'> Inicio de sesión </a>";
          echo "<a href='../index.php'> Inicio </a>";
        } elseif(isset($_SESSION['user'])) {
          echo "<a href='../controlador.php'> Inicio </a>";
        }
        ?>
        <a href="https://www.fime.uanl.mx/">FIME</a>
        <?php
        if(isset($_SESSION['user'])) {
          echo "<a href='tabla_asistencias.php'>Mis Conferencias</a>";
        }
        ?>
        <a href="nosotros.php">Acerca de</a>
        <?php
        if(isset($_SESSION['user'])) {
          echo "<a href='../include/logout.php'>Cerrar Sesión</a>";
        }
        
        ?>
      </nav>
    </div>
    </header>
    <!--encabezado-->


    <main>
      <section id="banner">
        <img src="../ima/fime.jpg">
        <div class="contenedor">
          <h2>Conferencias</h2>
          <p>Apuntate para alguna conferencia</p>
        </div>
      </section>
      
      <section class="contenedor">
        <h2 class="centro">Acerca de nosotros</h2>
        <br>
        <hr>
        <br>
        <h3 class="centro">Equipo conformado por:</h3>
        <br>
        <h3 class="centro">Abiam Alberto Escobedo Ruiz</h3>
        <br>
        <h3 class="centro"><i>alberto.escobedorz@uanl.edu.mx</i> </h4>
        <br>
        <h3 class="centro">Diego Benítez Reyna</h3>
        <br>
        <h3 class="centro"><i>diego.benitezryn@uanl.edu.mx</i></h4>
        <br>
        <h3 class="centro">Frida Marlene Cerda García</h3>
        <br>
        <h3 class="centro"><i>marlene.cerdagrc@uanl.edu.mx</i></h4>
        <br>
        <h3 class="centro">Iván Fernando Jiménez Rodríguez</h3>
        <br>
        <h3 class="centro"><i>ivan.jimenezro@uanl.edu.mx</i></h4>
        <br>
        <h3 class="centro">Luz Elena Nevárez Guajardo</h3>
        <br>
        <h3 class="centro"><i>luz.nevarezgj@uanl.edu.mx</i></h4>
        <br>
        <hr>
        <br>
        <h3 class="centro">Numero de contacto FIME:</h3>
        <h3 class="centro">(52) 81 8329 4020</h3>
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
    <a><img src="../ima/Logos.png" alt="LogoUANL" > </a>
  </ul>
</div>
      </section>
</footer>

    </main>
  </body>
</html>
