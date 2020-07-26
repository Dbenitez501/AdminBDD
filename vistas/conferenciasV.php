<?php
include_once '../include/db.php';
include_once '../include/virtual.php';
$db = new DB();
$virtual = new Virtual();

//PARA ELIMINAR REGISTRO
if(isset($_GET['del'])) {
  $id_del = $_GET['del'];
  $queryDel = $db->connect()->prepare("DELETE FROM virtual WHERE id_virtual = :id_del");
  $queryDel->execute(['id_del'=>$id_del]);
  header("location: conferenciasV.php");
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
        <img src="../ima/fime.jpg">
        <div class="contenedor_admin">
          <h2>Administración</h2>
          <p>Panel para administradores</p>
        </div>
      </section>
      
      <section id="Bienvenidos">
        <h2>Conferencias Virtuales</h2>
      </section>

      <div id="tabla_conf" align="center">
        <table class="tabla_conferencia">
          <tr>
            <th>Id</th>
            <th class="titulo">Título</th>
            <th class="desc">Descripción</th>
            <th>Expositor</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Plataforma</th>
            <th>Código Plataforma</th>
            <th>Asistencia</th>
            <th>Estado</th>
            <th><a href="nueva_conf_v.php"><input type="submit" value="Nuevo" class="boton_nuevo"></a></th>
          </tr>
          <?php
          $query = $db->connect()->prepare("SELECT * FROM virtual");
          $query->execute();

          if($query->rowCount()) {
            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
              $id = $data['id_virtual'];
          ?>
          <tr>
              <td><?php echo $id?></td>
              <td><?php echo $data['titulo'];?></td>
              <td><?php echo $data['descripcion'];?></td>
              <td><?php echo $data['expositor'];?></td>
              <td><?php echo $data['fecha_inicio'];?></td>
              <td><?php echo $data['hora_inicio'];?></td>
              <td><?php echo $data['plataforma'];?></td>
              <td><?php echo $data['codigo_plat'];?></td>
              <td><?php echo $data['codigo_asistencia'];?></td>
              <td><?php echo $virtual->getEstado($data['estado']);?></td>        
              <td align="center"><a href="mod_conf_v.php?id=<?php echo $id?>"><input type="submit" value="Modificar" class="boton_mod"></a><a href='#' onclick="preguntar(<?php echo $id?>)"><input type="submit" value="Eliminar" id="btnEliminar" class="boton_elim"></a></td>        
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
    <a><img src="../ima/Logos.png" alt="LogoUANL" > </a>
  </ul>
</div>
      </section>
</footer>

    </main>
    <script type="text/javascript">
      function preguntar(id) {
        if(confirm('¿Seguro que quieres eliminar?')) {
          window.location.href = "conferenciasV.php?del="+id;
        }
      }
    </script>
  </body>
</html>
