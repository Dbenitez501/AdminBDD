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
    <script type="text/javascript" src="../lib/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css?v=<?php echo(rand()); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <script type="text/javascript">
    //CODIGO PARA RECORDAR QUÉ RADIO BUTTON SELECCIONAMOS USANDO JQUERY
      $(document).ready(function(){
        var radios = document.getElementsByName("tipo");
        var val = localStorage.getItem('tipo');
        for(var i=0;i<radios.length;i++){
          if(radios[i].value == val){
            radios[i].checked = true;
          }
        }
        $('input[name="tipo"]').on('change', function(){
          localStorage.setItem('tipo', $(this).val());        
        });
      });
    </script>

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
        <h2>Filtrado por Conferencia</h2>
        <br>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form action="#" target="" method="POST" name="filtrado_conf">
          <?php
          $tipo = "";
          ?>
            <section id="Inicio_sesion">
              <h2>Filtrado</h2>
            </section>
            <section id="blog">
              <hr>
            </section>

            <h3 for="tipo">Tipo</h3>
            <input type="radio" name="tipo" value="P" id="tipo" checked="checked">
            <label for="P">Presencial</label>		
            <input type="radio" name="tipo" value="V" id="tipo">
            <label for="V">Virtual</label>
            <input type="submit" name="filtrar_tipo"  value="Seleccionar">
            <br>

            <h3 for="conferencia">Conferencia</h3>
            <select name="conferencia" id="conferencia">
              <option value="">--Escoge una Conferencia--</option>

              <?php
              //SEGÚN LO QUE SELECICONAMOS EN TIPO, SON LAS CONFERENCIAS QUE NOS VA A MOSTRAR EN EL COMBOBOX 
              if(isset($_POST['tipo']))
              {
                if($_POST['tipo'] == "P")
                {
                  $queryP = $db->connect()->prepare("SELECT * FROM presencial");
                  $queryP->execute();
                  $arrayList = $queryP->fetchAll(PDO::FETCH_ASSOC);

                  foreach($arrayList as $presencial)
                  {
              ?>
                  <option value="<?php echo $presencial['id_presencial'];?>"><?php echo $presencial['titulo'] . ", " . $presencial['tipo'];?></option>
              <?php
                  } 
                }

                if($_POST['tipo'] == "V")
                {
                  $queryV = $db->connect()->prepare("SELECT * FROM virtual");
                  $queryV->execute();
                  $arrayList = $queryV->fetchAll(PDO::FETCH_ASSOC);

                  foreach($arrayList as $virtual)
                  {
              ?>
                  <option value="<?php echo $virtual['id_virtual'];?>"><?php echo $virtual['titulo'] . ", " . $virtual['tipo'];?></option>
              <?php
                  }
                }
              }
              ?>

            </select>
            <br>
            <br>
            <input type="submit" name="filtrar_conf"  value="Filtrar">
          </form>

        </div>
      </section>

      <?php
      
      if(isset($_POST['conferencia']) && isset($_POST['tipo']) && $_POST['conferencia'] != "" )
      {
        $titulo="";

        if($_POST['tipo'] == "P")
        {
          
          $query1 = $db->connect()->prepare("SELECT usuarios.matricula, presencial.titulo, usuarios.nombre, usuarios.correo, registros.asistencia 
              FROM registros INNER JOIN usuarios ON registros.id_usuario=usuarios.id_usuario INNER JOIN presencial ON registros.id_presencial=presencial.id_presencial
              WHERE registros.id_presencial =:id");
          $query1->execute(['id'=>$_POST['conferencia']]);

          $query2 = $db->connect()->prepare("SELECT presencial.titulo FROM registros INNER JOIN presencial ON registros.id_presencial=presencial.id_presencial WHERE registros.id_presencial =:id1");
          $query2->execute(['id1'=>$_POST['conferencia']]);
          if($query2->rowCount()) {
            while ($data1 = $query2->fetch(PDO::FETCH_ASSOC)) {
              $titulo = $data1['titulo']; 
            }
          }

      ?>
        <h2>Conferencia: <?php echo $titulo;?></h2>
        <div id="tabla_reg" align="center">
          <table class="tabla_conferencia">
            <tr>
              <th>Nombre</th>
              <th class="nom">Matrícula</th>
              <th class="nom">Correo</th>
              <th>Asistió</th>
            </tr>
      <?php

          if($query1->rowCount()) {
            while ($data = $query1->fetch(PDO::FETCH_ASSOC)) {
              $matUsu = $data['matricula'];
              $nombreUsu = $data['nombre'];
              $correoUsu = $data['correo'];
              $asist = $data['asistencia'];
      ?>
                   
            <tr>
              <td><?php echo $nombreUsu?></td>
              <td><?php echo $matUsu?></td>
              <td><?php echo $correoUsu?></td>
              <td><?php echo $asist?></td>
            </tr>
            <?php
              }
            }
            ?>
          </table>
        </div>

      <?php
        }

        if($_POST['tipo'] == "V")
        {
          $query1 = $db->connect()->prepare("SELECT usuarios.matricula, virtual.titulo, usuarios.nombre, usuarios.correo, registros.asistencia 
              FROM registros INNER JOIN usuarios ON registros.id_usuario=usuarios.id_usuario INNER JOIN virtual ON registros.id_virtual=virtual.id_virtual
              WHERE registros.id_virtual =:id");
          $query1->execute(['id'=>$_POST['conferencia']]);

          $query2 = $db->connect()->prepare("SELECT virtual.titulo FROM registros INNER JOIN virtual ON registros.id_virtual=virtual.id_virtual WHERE registros.id_virtual =:id1");
          $query2->execute(['id1'=>$_POST['conferencia']]);
          if($query2->rowCount()) {
            while ($data1 = $query2->fetch(PDO::FETCH_ASSOC)) {
              $titulo = $data1['titulo']; 
            }
          }
      ?>
      <h2>Conferencia: <?php echo $titulo;?></h2>
        <div id="tabla_reg" align="center">
          <table class="tabla_conferencia">
            <tr>
              <th>Nombre</th>
              <th class="nom">Matrícula</th>
              <th class="nom">Correo</th>
              <th>Asistió</th>
            </tr>
      <?php
          if($query1->rowCount()) {
            while ($data = $query1->fetch(PDO::FETCH_ASSOC)) {
              $matUsu = $data['matricula'];
              $nombreUsu = $data['nombre'];
              $correoUsu = $data['correo'];
              $asist = $data['asistencia'];
      ?>
            <tr>
              <td><?php echo $nombreUsu?></td>
              <td><?php echo $matUsu?></td>
              <td><?php echo $correoUsu?></td>
              <td><?php echo $asist?></td>
            </tr>
      <?php 
            }
          }
      ?>
        </table>
      </div>
      <?php
        }
      }
      ?>-

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
