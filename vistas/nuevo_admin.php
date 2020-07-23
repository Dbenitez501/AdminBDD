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
        <a href="../index.php"> Inicio</a>
        <a href="https://www.fime.uanl.mx/">FIME</a>
      </nav>
    </div>
    </header>
    <!--encabezado-->

    <main>
      <section id="banner">
        <img src="../ima/fime.jpg">
        <div class="contenedor">
          <h2>Conferencias</h2>
          <p>Apuntate para alguna conferencia</p>
        </div>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form action="">

            <section id="Inicio_sesion">
                <h2>Nuevo Administrador</h2>
              </section>
            <section id="blog">
                <hr>
            </section>

            <h3 for="nombre">Nombre</h3>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" required>
            <br>
            <h3 for="email">Email</h3>
            <input type="email" name="email" id="email" placeholder="@" required>
            <br>
            <h3 for="telefono">Telefono</h3>
            <input type ="text" name="telefono" id="telefono" placeholder="(Opcional)">
            <br>
            <h3 for="sexo">Sexo</h3>
            <input type="radio" name="sexo" value="H" id="sexo">
            <label for="H">Hombre</label>		
            <input type="radio" name="sexo" value="M" id="sexo">
            <label for="M">Mujer</label>
            <br>
            <h3 for="username">Username</h3>
            <input type ="text" name="username" id="username" placeholder="Username" required>
            <br>
            <h3 for="contra">Contraseña</h3>
            <input type ="password" name="contra" id="contra" placeholder="*****" required>

            <input type="submit" name="enviar_admin"  value="Registrar">

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