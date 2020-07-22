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
    <script src="../js/validarRegistroVirtual.js"></script>

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
        
          <form action="../include/registrarCVirtual.php" target="" method="POST" name="formRegConfVirtual" onsubmit="return validar();">

            <section id="Inicio_sesion">
              <h2>Asistencia a: ####</h2>
              <br>
              <h4>Fecha: ##/##/##</h2>
              <br>
              <h4>Hora:##:##</h2>
            </section>
            <section id="blog">
              <hr>
            </section>

            <h3 for="code">Código de asistencia:</h3>
            <input type="text" name="code" id="code" placeholder="......" required>
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