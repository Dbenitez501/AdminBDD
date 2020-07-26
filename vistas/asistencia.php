<?php
include_once '../include/db.php';
include_once '../include/presencial.php';
include_once '../include/virtual.php';

$db = new DB();
$pre = new Presencial();
$virtual = new Virtual();
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
    <link rel="stylesheet" href="../css/registro_sesion.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" type="text/css" href="../css/tcal.css" />
    <link rel="stylesheet" href="../css/encabezado.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css?v=<?php echo(rand()); ?>" />    
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <script type="text/javascript" src="../js/tcal.js"></script>
    <script src="../js/validarCodAsistencia.js"></script>

  </head>
  <body>
    <!--encabezado-->
    <header>
    <div class="contenedor">
        <a><h1>FIME</h1></a>
      <input type="checkbox" id="menu-bar">
      <label class="icon-menu" for="menu-bar"></label>
      <nav class="menu">
        <a href="../controlador.php"> Inicio</a>
        <a href="https://www.fime.uanl.mx/">FIME</a>
        <a href="tabla_asistencias.php">Mis Conferencias</a>
        <a href="nosotros.php">Acerca de</a>
        <a href="../include/logout.php">Cerrar Sesión</a>
      </nav>
    </div>
    </header>
    <!--encabezado-->


    <main>
      <section id="banner">
        <img src="../ima/fime.jpg">
        <div class="contenedor_admin">
          <h2>Mis Conferencias</h2>
          <p>Checa las conferencias a las que te registraste</p>
        </div>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form action="<?php
          if(isset($_GET['idRegP'])) {
            echo '../include/verificaCodPre.php';
          } elseif (isset($_GET['idRegV'])) {
            echo '../include/verificaCodVirtual.php';
          }
          ?>" target="" method="POST" name="regAsistencia" onsubmit="return validar();">

            <section id="Inicio_sesion">
              <h2>Asistencia a: <?php
              if(isset($_GET['idRegP'])) {
                $id = $_GET['idRegP'];
                echo $pre->getTituloConf($id);
              } elseif (isset($_GET['idRegV'])) {
                $id = $_GET['idRegV'];
                echo $virtual->getTituloConf($id);
              }
              ?></h2>
              <br>
              <h4>Fecha: <?php
              if(isset($_GET['idRegP'])) {
                $id = $_GET['idRegP'];
                echo $pre->getFechaConf($id);
              } elseif (isset($_GET['idRegV'])) {
                $id = $_GET['idRegV'];
                echo $virtual->getFechaConf($id);
              }
              ?></h2>
              <br>
              <h4>Hora: <?php
              if(isset($_GET['idRegP'])) {
                $id = $_GET['idRegP'];
                echo $pre->getHoraConf($id);
              } elseif (isset($_GET['idRegV'])) {
                $id = $_GET['idRegV'];
                echo $virtual->getHoraConf($id);
              }
              ?></h2>
            </section>
            <section id="blog">
              <hr>
            </section>
            <input type="hidden" name="id" id="id" value="<?php
              if(isset($_GET['idRegP'])) {
                $id = $_GET['idRegP'];
                echo $id;
              } elseif (isset($_GET['idRegV'])) {
                $id = $_GET['idRegV'];
                echo $id;
              }
              ?>">  
            <h3 for="code">Código de asistencia:</h3>
            <input type="text" name="codigo" id="codigo" placeholder="......">
            <br>
            <h3 for="comentario">Comentario:</h3>
            <br>
            <textarea  type="textarea" name="comentario" id="comentario" placeholder="(Opcional)" style="font-size:20px ;margin:5px; width: 75%; height: 150px;"></textarea>
            
            <input type="submit" name="guardar_asistencia"  value="Guardar">

          </form>

        </div>
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