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
    <link rel="stylesheet" href="../css/encabezado.css?v=<?php echo(rand()); ?>" />
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
        <img src="../img/fime.jpg">
        <div class="contenedor_admin">
          <h2>Administración</h2>
          <p>Panel para administradores</p>
        </div>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form action="../include/registrarCVirtual.php" target="" method="POST" enctype="multipart/form-data" name="formRegConfVirtual" onsubmit="return validar();">

            <section id="Inicio_sesion">
              <h2>Nueva Conferencia Virtual</h2>
            </section>
            <section id="blog">
              <hr>
            </section>

            <h3 for="titulo">Título</h3>
            <input type="text" name="titulo" id="titulo" placeholder="..." required>
            <br>
            <h3 for="descripcion">Descripción</h3>
            <textarea type="text" name="descripcion" id="descripcion" placeholder="Descripción" requiered></textarea>
            <br>
            <h3 for="expositor">Expositor</h3>
            <input type="text" name="expositor" id="expositor" placeholder="Nombre" required>
            <br>
            <h3 for="fecha">Fecha</h3>
            <input type="text" name="fecha" id="fecha" class="tcal" placeholder="año/mes/día (Seleccionar)">
            <br>
            <h3 for="hora">Hora</h3>
            <input type ="text" name="hora" id="hora" placeholder="24h">
            <br>
            <h3 for="plataforma">Plataforma</h3>
            <input type ="text" name="plataforma" id="plataforma" placeholder="(MsTeams,Zoom..)" required>
            <br>
            <h3 for="codigo_plat">Código de Plataforma</h3>
            <input type ="text" name="codigo_plat" id="codigo_plat" placeholder="">
            <br>
            <h3 for="codigo_as">Código de asistencia</h3>
            <input type ="text" name="codigo_as" id="codigo_as" required>
            <br>
            <h3 for="cap_max">Capacidad Máxima </h3>
            <input type ="text" name="cap_max" id="cap_max" placeholder="###" required>

            <h3 for="image">Imagen</h3>
            <input type="file" class="form-img" id="imagen" name="imagen" multiple>
            <br>
            <br>
            
            <input type="submit" name="registrar_conf_v"  value="Registrar">

          </form>

        </div>
      </section>
      <br>
      <br>

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