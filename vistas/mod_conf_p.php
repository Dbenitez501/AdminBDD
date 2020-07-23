<?php
include_once '../include/db.php';
include_once '../include/consultaPresencial.php';
include_once '../include/presencial.php';
$db = new DB();
$presencial = new Presencial();
$cons = new ConsultaPre();

$consulta = $cons->consultarPre($_GET['id']);

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css?v=<?php echo(rand()); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <script type="text/javascript" src="../js/tcal.js"></script>
    <script src="../js/validarRegistroPresencial.js"></script>

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
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form action="../include/modificarPresencial.php" target="" method="POST" name="modPresencial" onsubmit="return validar();">
            <?php
            $est;
            $queryCB = $db->connect()->prepare("SELECT * FROM lugar_expo");
            $queryCB->execute();
            $arrayList = $queryCB->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <section id="Inicio_sesion">
              <h2>Conferencia Presencial</h2>
            </section>
            <section id="blog">
              <hr>
            </section>

            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>">
            
            <h3 for="titulo">Titulo</h3>            
            <input type="text" name="titulo" id="titulo" value="<?php echo $consulta[0];?>" placeholder="...">
            <br>
            <h3 for="descripcion">Descripción</h3>
            <textarea type="text" name="descripcion" id="descripcion" " placeholder="descripción"><?php echo $consulta[1];?></textarea>
            <br>
            <h3 for="expositor">Expositor</h3>
            <input type="text" name="expositor" id="expositor" value="<?php echo $consulta[2];?>" placeholder="Nombre">
            <br>
            <h3 for="fecha">Fecha</h3>
            <input type="text" name="fecha" id="fecha" class="tcal" value="<?php echo $consulta[3];?>" placeholder="año/mes/día (Seleccionar)">
            <br>
            <h3 for="hora">Hora</h3>
            <input type ="text" name="hora" id="hora" value="<?php echo $consulta[4];?>" placeholder="24h">
            <br>
            <h3 for="lugar">Lugar</h3>
            <select name="lugar" id="lugar">
              <option value="<?php echo $consulta[6];?>"><?php echo $presencial->getNombreByID($consulta[6]);?></option>
              <?php 
              foreach($arrayList as $nombre) {
              ?>
              <option value="<?php echo $nombre['id_lugar'];?>"><?php echo $nombre['nombre'];?></option>
              <?php
              }
              ?>
            </select>
            <br>
            <h3 for="codigo_as">Código de asistencia</h3>
            <input type ="text" name="codigo_as" id="codigo_as" value="<?php echo $consulta[7];?>">
            <br>
            <h3 for="estado">Estado</h3>
            <input type="radio" name="estado" value="1" id="estado" <?php if($consulta[5] == "1") echo "checked"; ?>>
            <label for="1">Activado</label>		
            <input type="radio" name="estado" value="0" id="estado" <?php if($consulta[5] == "0") echo "checked"; ?>>
            <label for="0">Desactivado</label>
            <br>
            <br>            
            <input type="submit" name="registrar_conf_p"  value="Modificar">

          </form>

        </div>
      </section>
      <br>
      <br>

      <footer id="redes">
        <div class="contenedor">
          <div class="sociales">
            <img align="right" src="../ima/Logos.png">
          </div>
        </div>
      </footer>

    </main>
  </body>
</html>
