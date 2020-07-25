<?php
include_once '../include/db.php';
include_once '../include/consultaAdmin.php';
$db = new DB();
//$admin = new 
$cons = new ConsultaAdmin();
$consulta = $cons->consultarAdmin($_GET['id']);

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
    <link rel="stylesheet" href="../css/encabezado.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css?v=<?php echo(rand()); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <script src="../js/validarAdmin.js"></script>    
    
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
        <div class="contenedor">
          <h2>Administración</h2>
          <p>Panel para administradores</p>
        </div>
      </section>
      
      <section class="contenedor">
        <div class="contenedor_2">
        
          <form action="../include/modificarAdmin.php" target="" method="POST" name="formAdmin" onsubmit="return validar();">

            <section id="Inicio_sesion">
                <h2>Modificar Administrador</h2>
              </section>
            <section id="blog">
                <hr>
            </section>

            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>">
            <h3 for="nombre">Nombre</h3>
            <input type="text" name="nombre" id="nombre" value="<?php echo $consulta[2];?>" placeholder="Nombre Completo" required>
            <br>
            <h3 for="email">Email</h3>
            <input type="email" name="email" id="email" value="<?php echo $consulta[3];?>" placeholder="@" required>
            <br>
            <h3 for="telefono">Teléfono</h3>
            <input type ="text" name="telefono" id="telefono" value="<?php echo $consulta[4];?>" placeholder="(Opcional)">
            <br>
            <h3 for="sexo">Sexo</h3>
            <input type="radio" name="sexo" value="H" id="sexo" <?php if($consulta[5] == "H") echo "checked"; ?>>
            <label for="H">Masculino</label>		
            <input type="radio" name="sexo" value="M" id="sexo" <?php if($consulta[5] == "M") echo "checked"; ?>>
            <label for="M">Femenino</label>
            <br>
            <h3 for="username">Username</h3>
            <input type ="text" name="username" id="username" value="<?php echo $consulta[0];?>" placeholder="Username" required>
            <br>
            <h3 for="contra">Contraseña</h3>
            <input type ="password" name="contra" id="contra" value="<?php echo $consulta[1];?>" placeholder="*****" required>

            <input type="submit" name="enviar_admin"  value="Modificar">

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
    <a><img src="../ima/Logos.png" alt="LogoUANL" > </a>
  </ul>
</div>
      </section>
</footer>

    </main>
  </body>
</html>