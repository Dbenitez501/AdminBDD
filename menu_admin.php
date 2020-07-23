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
        <a href="controlador.php"> Inicio</a>
        <a href="https://www.fime.uanl.mx/">FIME</a>
        <?php        
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
          <h2>Administración</h2>
          <p>Panel para administradores</p>
        </div>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form class="formulario" action="" method="POST">
            <section id="Registro_sesion">
              <h2>Menú</h2>
              <br>
              <h3>Bienvenido/a: <?php
                if(isset($_SESSION['user'])) {
                  echo $user->getNombre();
                } else {
                  echo "";
                }
              ?>
              </h3>
              <br>
              <hr>
              <br>
              <i class="far fa-plus-square icon"></i><a class="link" href="vistas/menu_tipo.php">Conferencias</a>
              <br>
              <br>
              <i class="fas fa-map-marker-alt icon"></i><a class="link" href="vistas/admin_lugares.php">Lugares de exposición</a>
              <br>
              <br>
              <i class="far fa-clipboard icon"></i><a class="link" href="vistas/registros_conferencia.php">Registros Conferencia</a>
              <br>
              <br>
              <i class="fas fa-plus icon"></i><a class="link" href="vistas/administradores.php">Nuevo Administrador</a>
              <br>
              
            </section>
          </form>

        </div>      
      </section>
      <br>
      <br>

      <footer id="redes">
        <div class="contenedor">
          <div class="sociales">
            <img align="right" src="ima/Logos.png">
          </div>
        </div>
      </footer>

    </main>
  </body>
</html>

