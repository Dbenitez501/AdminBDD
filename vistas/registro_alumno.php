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
        
        <form action="#" target="" method="get" name="formDatosPersonales">

                <section id="Inicio_sesion">
                    <h2>Alumno</h2>
                  </section>
                  <section id="blog">
                    <hr>
                </section>

	        <h3 for="nombre">Nombre</h3>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo"/>
            <br>
    	    <h3 for="Matricula">Matricula</h3>
            <input type="text" name="Matricula" id="Matricula" placeholder="###"/>
            <br>
    	    <h3 for="Carrera">Carrera</h3>
	        <input type="text" name="Carrera" id="Carrera" placeholder="(IAS,ITS,IME,IMA..)"/>
            <br>
	        <h3 for="email">Email</h3>
	        <input type="text" name="email" id="email" placeholder="@" required />
            <br>
	        <h3 for="Telefono">Telefono</h3>
            <input type ="text" name="telefono" id="telefono" placeholder="(Opcional)"/>
            <br>
            <h3 for="Sexo">Sexo</h3>
                <input type="radio" name="sexo" value="hombre" id="sexo">
				<label for="hombre">Hombre</label>
		
				<input type="radio" name="sexo" value="mujer" id="sexo">
				<label for="mujer">Mujer</label>
            <br>
	        <h3 for="Username">Username</h3>
            <input type ="text" name="Username" id="Username" placeholder="Username"/>
            <br>
	        <h3 for="Contraseña">Contraseña</h3>
            <input type ="password" name="Contraseña" id="Contraseña" placeholder="*****"/>
            
            <input type="submit" name="enviar_alumno"  value="Registrar"/>
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
