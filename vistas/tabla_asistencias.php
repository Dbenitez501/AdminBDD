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



//PARA ELIMINAR REGISTRO
if(isset($_GET['delV'])) {
  $id_del = $_GET['delV'];

  $procedure = $db->connect()->prepare('CALL restar_capacidad_virtual(?)');
  $procedure->bindParam(1, $id_del, PDO::PARAM_INT);
  $procedure->execute();

  $queryDel = $db->connect()->prepare("DELETE FROM registros WHERE id_registro = :id_del");
  $queryDel->execute(['id_del'=>$id_del]);
  header("location: tabla_asistencias.php");
}

if(isset($_GET['delP'])) {
  $id_del = $_GET['delP'];

  $procedure = $db->connect()->prepare('CALL restar_capacidad_presencial(?)');
  $procedure->bindParam(1, $id_del, PDO::PARAM_INT);
  $procedure->execute();

  $queryDel = $db->connect()->prepare("DELETE FROM registros WHERE id_registro = :id_del");
  $queryDel->execute(['id_del'=>$id_del]);
  header("location: tabla_asistencias.php");
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
        <a href="../controlador.php">Inicio</a>
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
        <img src="../img/fime.jpg">
        <div class="contenedor_admin">
          <h2>Mis Conferencias</h2>
          <p>Checa las conferencias a las que te registraste</p>
        </div>
      </section>
      
      <section id="Bienvenidos">
        <h2>Conferencias Presenciales</h2>
      </section>

      <?php
      $consultaP="SELECT registros.id_registro, presencial.titulo, presencial.descripcion, presencial.fecha_inicio, presencial.hora_inicio, lugar_expo.nombre, lugar_expo.ubicacion FROM 
      registros INNER JOIN presencial ON registros.id_presencial=presencial.id_presencial INNER JOIN lugar_expo ON presencial.id_lugar=lugar_expo.id_lugar WHERE registros.id_usuario=:user";
      $queryP = $db->connect()->prepare($consultaP);
      $queryP->execute(['user' => $idUser]);
      if(!$queryP->rowCount()){
        echo '<h3 class="h2-misconfe">No hay conferencias presenciales registradas</h3><br><br>';
      } else {
      ?>

      <div id="tabla_conf" align="center">
        <table class="tabla_conferencia">          
          <tr>
            <th>Título</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Lugar</th>
            <th>Asistencia</th>
          </tr>
          <?php        
          while ($dataP = $queryP->fetch(PDO::FETCH_ASSOC)) {
            $idRegP = $dataP['id_registro'];
          ?>
          <tr> 
            <td><?php echo $dataP['titulo'];?></td>
            <td><?php echo $dataP['fecha_inicio'];?></td>
            <td><?php echo $dataP['hora_inicio'];?></td>
            <td><?php echo $dataP['nombre'] . ", " . $dataP['ubicacion'];?></td>             
            <td align="center"><a href="asistencia.php?idRegP=<?php echo $idRegP?>"><input type="submit" value="Asistencia" class="boton_mod"></a><a href='#' onclick="preguntarP(<?php echo $idRegP?>)"><input type="submit" value="Eliminar" id="btnEliminar" class="boton_elim"></a></td>
          </tr>
          <?php
            }
        }
        ?>             
        </table>
      </div>

      <section id="Bienvenidos">
        <h2>Conferencias Virtuales</h2>
      </section>

      <?php
      $consultaV = "SELECT registros.id_registro, virtual.titulo, virtual.descripcion,virtual.fecha_inicio,virtual.hora_inicio,virtual.plataforma,virtual.codigo_plat 
      FROM registros INNER JOIN virtual ON registros.id_virtual= virtual.id_virtual WHERE registros.id_usuario=:user";

      $queryV = $db->connect()->prepare($consultaV);
      $queryV->execute(['user'=>$idUser]);
      if(!$queryV->rowCount()){
        echo '<h3 class="h2-misconfe">No hay conferencias virtuales registradas</h3><br><br>';
      } else {
      ?>

      <div id="tabla_conf" align="center">
        <table class="tabla_conferencia">
          <tr>
            <th>Título</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Plataforma</th>
            <th>Código de Acceso </th>
            <th>Asistencia</th>
          </tr>
          <?php    
            while ($dataV = $queryV->fetch(PDO::FETCH_ASSOC)) {
              $idRegV = $dataV['id_registro'];
          ?>
          <tr>
            <td><?php echo $dataV['titulo'];?></td>
            <td><?php echo $dataV['fecha_inicio'];?></td>
            <td><?php echo $dataV['hora_inicio'];?></td>
            <td><?php echo $dataV['plataforma'];?></td>
            <td><?php echo $dataV['codigo_plat'];?></td>                
            <td align="center"><a href="asistencia.php?idRegV=<?php echo $idRegV?>"><input type="submit" value="Asistencia" class="boton_mod"></a><a href='#' onclick="preguntarV(<?php echo $idRegV?>)"><input type="submit" value="Eliminar" id="btnEliminar" class="boton_elim"></a></td>
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
      function preguntarP(id) {
        if(confirm('¿Seguro que quieres eliminar?')) {
          window.location.href = "tabla_asistencias.php?delP="+id;
        }
      }

      function preguntarV(id) {
        if(confirm('¿Seguro que quieres eliminar?')) {
          window.location.href = "tabla_asistencias.php?delV="+id;
        }
      }
    </script>
  </body>
</html>
