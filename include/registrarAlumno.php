<?php
include_once 'db.php';
$db = new DB();

//Recibe los datos y los almacena en variables
$nombre     = $_POST['nombre'];
$matricula  = $_POST['mat'];
$carrera    = $_POST['carrera'];
$email      = $_POST['email'];
$username   = $_POST['username'];
$contra     = $_POST['contra'];
$sexo;
$telefono;
$tipo = 3;

if(isset($_POST['sexo'])) {
    $sexo = $_POST['sexo'];
} else {
    $sexo = "";
}

if(isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
}

//Consulta para insertar los datos del alumno
$insertar = "INSERT INTO usuarios (username, contra, nombre, carrera, matricula, correo, telefono, sexo, id_tipo) VALUES 
('$username', '$contra', '$nombre', '$carrera', '$matricula', '$email', '$telefono', '$sexo', '$tipo')";

//VERIFICA SI YA EXISTE EL USERNAME
$verificarUsuario = $db->connect()->prepare("SELECT * FROM usuarios WHERE username = :user");
$verificarUsuario->execute(['user' => $username]);

if($verificarUsuario->rowCount() > 0) {
    echo '<script>
        alert("El usuario ya está registrado");
        window.history.go(-1);
    </script>';
    exit;
}

//VERIFICA SI YA EXISTE EL CORREO
$verificarCorreo = $db->connect()->prepare("SELECT * FROM usuarios WHERE correo = :email");
$verificarCorreo->execute(['email' => $email]);

if($verificarCorreo->rowCount() > 0) {
    echo '<script>
        alert("El correo ya está registrado");
        window.history.go(-1);
    </script>';
    exit;
}

//VERIFICA SI YA EXISTE LA MATRICULA
$verificarMatricula = $db->connect()->prepare("SELECT * FROM usuarios WHERE matricula = :mat");
$verificarMatricula->execute(['mat' => $matricula]);

if($verificarMatricula->rowCount() > 0) {
    echo '<script>
        alert("La matrícula ya existe");
        window.history.go(-1);
    </script>';
    exit;
}

//EJECUTA LA CONSULTA DE INSERTAR
$query = $db->connect()->prepare($insertar);
$query->execute();

if(!$query) {
    echo '<script>
        alert("Error al registrarse");
        window.history.go(-1);
    </script>';
} else {
    echo '<script>
            alert("Se registró correctamente");
            window.location = "../controlador.php";
        </script>';
    //header("location: ../controlador.php");
}

?>