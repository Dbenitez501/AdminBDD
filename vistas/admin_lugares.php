<?php
include_once '../include/db.php';
$db = new DB();

//PARA ELIMINAR REGISTRO
if(isset($_GET['del'])) {
  $id_del = $_GET['del'];
  $queryDel = $db->connect()->prepare("DELETE FROM lugar_expo WHERE id_lugar = :id_del");
  $queryDel->execute(['id_del'=>$id_del]);
  header("location: admin_lugares.php");
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
    <link rel="stylesheet" href="../css/registro_sesion.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/tabla.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="../css/encabezado.css?v=<?php echo(rand()); ?>" />
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
        <h2>Lugares de exposición</h2>
      </section>

      <div id="tabla_conf" align="center">
        <table class="tabla_lugares">
          <tr>
            <th>#</th>
            <th class="titulo">Nombre</th>
            <th class="desc">Ubicación</th>
            <th>Capacidad</th>
            <th>Descripción</th>
            <th><a href="lugares_nuevo.php"><input type="submit" value="Nuevo" class="boton_nuevo"></a></th>
          </tr>
          <?php
          $query = $db->connect()->prepare("SELECT * FROM lugar_expo");
          $query->execute();

          if($query->rowCount()) {
            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
              $id = $data['id_lugar'];
          ?>
          <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $data['nombre'];?></td>
            <td class="desc"><?php echo $data['ubicacion'];?></td>
            <td><?php echo $data['capacidad_max'];?></td>
            <td><?php echo $data['descripcion'];?></td>
            <td align="center"><a href="mod_conf_l.php?id=<?php echo $id?>"><input type="submit" value="Modificar" class="boton_mod"></a><a href='#' onclick="preguntar(<?php echo $id?>)"><input type="submit" value="Eliminar" id="btnEliminar" class="boton_elim"></a></td>
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
    <script type="text/javascript">
      function preguntar(id) {
        if(confirm('¿Seguro que quieres eliminar?')) {
          window.location.href = "admin_lugares.php?del="+id;
        }
      }
    </script>
  </body>
</html>