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
        <a href="index.php"> Inicio</a>
        <a href="https://www.fime.uanl.mx/">FIME</a>
      </nav>
    </div>
    </header>
    <!--encabezado-->


    <main>
      <section id="banner">
        <img src="ima/fime.jpg">
        <div class="contenedor">
          <h2>Conferencias</h2>
          <p>Apuntate para alguna conferencia</p>
        </div>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
            <form class="formulario" action="" method="POST">
              <?php
              //Arroja un error si el usuario y/o contraseña están incorrectos
              //variable $errorLogin se encuentra en el archivo index.php
                if(isset($errorLogin)) {
                  echo "<h2>" . $errorLogin . "</h2>";
                }
              ?>
                <section id="Inicio_sesion">
                    <h2>Inicio de sesión</h2>
                  </section>

                 <div class=".contenedor_inicioseccion">
                     <div class="input-contenedor">
                     <i class="fas fa-user icon"></i>
                     <input type="text" name="username" placeholder="Usuario">
                     </div>

                     <div class="input-contenedor">
                     <i class="fas fa-key icon"></i>
                     <input type="password" name="password" placeholder="Contraseña">
                     </div>

                     <input type="submit" value="Login" class="button">
                     <section id="Bienvenidos">
                        <br>
                        <h4>¿No tienes una cuenta? <a class="link" href="vistas/nuevo_usu.php">Registrate</a></h4>
                     </section>
                 </div>
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
