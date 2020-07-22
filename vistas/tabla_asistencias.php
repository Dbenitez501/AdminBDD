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
            <td></td> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>             
            <td align="center"><a href="asistencia.php"><input type="submit" value="Asistencia" class="boton_mod"></a></td>
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
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>                
            <td align="center"><a href="asistencia.php"><input type="submit" value="Asistencia" class="boton_mod"></a></td>
          </tr>             
        </table>
      </div>

      

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
