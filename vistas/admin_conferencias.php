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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css?v=<?php echo(rand()); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">   
    <script src="../js/validarAlumno.js"></script>

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

      
        <section id="Bienvenidos">
          <h2>Conferencias</h2>
        </section>

      <div id="tabla_conf" align="center">
              <table class="tabla_conferencia">
                <tr>
                  <th class="titulo">Conferencia</th>
                  <th class="desc">Descripción</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Lugar de exposición</th>
                  <th><a href="menu_tipo.php"><input type="submit" value="Nuevo" class="boton_nuevo"></a></th>
                </tr>
                <tr>
                  <td>Conferencia 1</td>
                  <td class="desc">Descripción 1 saj djs jakbjdkankda d naskl daj dasnjkda dbas jn sakl da d ankm askd jksa ndkasl ndkla bdjna kl da adsjkak</td>
                  <td>Fecha</td>
                  <td>Hora</td>
                  <td>Lugar 1</td>
                  <td align="center"><input type="submit" value="Modificar" class="boton_mod"><input type="submit" value="Eliminar" class="boton_elim"></td>
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
