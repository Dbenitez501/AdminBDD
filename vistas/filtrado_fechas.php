<?php
include_once '../include/db.php';
$db = new DB();
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
    <link rel="stylesheet" href="../css/tabla.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/encabezado.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/tcal.css?v=<?php echo(rand()); ?>" />
    <script src="../js/tcal.js" ></script>
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
        <a href="../controlador.php"> Inicio</a>
        <a href="https://www.fime.uanl.mx/">FIME</a>        
      </nav>
    </div>
    </header>
    <!--encabezado-->

    <main>
      <section id="banner">
        <img src="../img/fime.jpg">
        <div class="contenedor_admin">
          <h2>Administración</h2>
          <p>Panel para administradores</p>
        </div>
      </section>
      
      <section id="Bienvenidos">
        <h2>Filtrado por Fechas</h2>
        <br>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form action="" target="" method="POST" name="filtrado_conf">

            <section id="Inicio_sesion">
              <h2>Filtrado</h2>
            </section>
            <section id="blog">
              <hr>
            </section>
            <h3 for="fecha">Fecha inicial</h3>
            <input type="text" name="fecha_i" id="fecha" class="tcal" placeholder="año/mes/día (Seleccionar)">
            <br>
            <h3 for="fecha">Fecha final</h3>
            <input type="text" name="fecha_i" id="fecha" class="tcal" placeholder="año/mes/día (Seleccionar)">
            <br>
            <br>
            <input type="submit" name="filtrar_conf"  value="Filtrar">
          </form>

        </div>
      </section>


      <div id="tabla_reg" align="center">
        <table class="tabla_conferencia">
          <tr>
            <th>Id</th>
            <th class="nom">Nombre</th>
            <th class="tipo">Tipo</th>
            <th>No.Conferencia</th>
            <th class="Conferencia">Correo</th>
            <th class="Reconocimiento">Aplica Reconocimiento</th>
          </tr>
          <?php
          $query = $db->connect()->prepare("SELECT * FROM asistencia_registro");
          $query->execute();
          if($query->rowCount()) {
            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
              $idUsu = $data["id_usuario"];
          ?>           
          <tr>
            <td><?php echo $idUsu?></td>
            <td><?php echo $data['nombre'];?></td>
            <td><?php echo $data['tipo'];?></td>
            <td><?php echo $data['cant_conf'];?></td>
            <td><?php echo $data['correo'];?></td>
            <td>
            <?php 
            if($data['tipo'] == "Estudiante") {
              if($data['cant_conf']>=3) {
                echo "Si";
              } else {
                echo "No";
              }
            } elseif ($data['tipo'] == "Docente") {
              if($data['cant_conf']>=1) {
                echo "Si";
              } else {
                echo "No";
              }
            } elseif($data['tipo'] == "Externo") {
              echo "No";
            }
            ?>
            </td>
          </tr>
          <?php
            }
          }
          ?>
        </table>
      </div>

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
    <a><img src="../img/Logos.png" alt="LogoUANL" > </a>
  </ul>
</div>
      </section>
</footer>

    </main>
  </body>
</html>
