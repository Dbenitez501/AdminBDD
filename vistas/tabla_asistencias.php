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
    <link rel="stylesheet" href="css/registro_sesion.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/registro.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/tabla.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/encabezado.css?v=<?php echo(rand()); ?>" />
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
        <a href="controlador.php">Inicio</a>
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
        <img src="ima/fime.jpg">
        <div class="contenedor_admin">
          <h2>Mis Conferencias</h2>
          <p>Checa las conferencias a las que te registraste</p>
        </div>
      </section>
      
      <section id="Bienvenidos">
        <h2>Conferencias Presenciales</h2>
      </section>

      <div id="tabla_conf" align="center">
        <table class="tabla_conferencia">
          <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Lugar</th>
            <th>Asistencia</th>
          </tr>
          <tr>        
            <td>2</td> 
            <td>Programación Web</td>
            <td>Conferencia sobre la programación web actualmente</td>
            <td>2020-08-02</td>
            <td>14:00</td>
            <td>La Gloria, CIDET 5to Piso</td>             
            <td align="center"><a href="vistas/asistencia.php"><input type="submit" value="Asistencia" class="boton_mod"></a></td>
          </tr>             
        </table>
      </div>

      <section id="Bienvenidos">
        <h2>Conferencias Virtuales</h2>
      </section>

      <div id="tabla_conf" align="center">
        <table class="tabla_conferencia">
          <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Plataforma</th>
            <th>Código de Acceso </th>
            <th>Asistencia</th>
          </tr>
          <tr>      
          <td>1</td>
          <td>Tecnología de la información</td>
          <td>Tecnología de la información refiere al uso de equipos de telecomunicaciones y computadoras
                (ordenadores) para la transmisión, el procesamiento y el almacenamiento de datos.</td>
          <td>2020-07-23</td>
          <td>15:00</td>
          <td>MsTeams</td>
          <td>HS2819</td>                
            <td align="center"><a href="vistas/asistencia.php"><input type="submit" value="Asistencia" class="boton_mod"></a></td>
          </tr>             
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
    <a><img src="ima/Logos.png" alt="LogoUANL" > </a>
  </ul>
</div>
      </section>
</footer>

    </main>
  </body>
</html>
