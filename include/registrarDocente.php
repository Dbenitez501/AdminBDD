<?php
include_once 'db.php';
$db = new DB();

//Recibe los datos y los almacena en variables
$nombre     = $_POST['nombre'];
$numero_emp  = $_POST['numero_emp'];
$email      = $_POST['email'];
$username   = $_POST['username'];
$contra     = $_POST['contra'];
$sexo;
$telefono;
$tipo = 2;

if(isset($_POST['sexo'])) {
    $sexo = $_POST['sexo'];
} else {
    $sexo = "";
}

if(isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
}

//Consulta para insertar los datos del Docente
$insertar = "INSERT INTO usuarios (username, contra, nombre, matricula, correo, telefono, sexo, id_tipo) VALUES 
('$username', '$contra', '$nombre', '$numero_emp', '$email', '$telefono', '$sexo', '$tipo')";

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

//VERIFICA SI YA EXISTE EL NUMERO DE EMPLEADO
$verificarNumEmp = $db->connect()->prepare("SELECT * FROM usuarios WHERE matricula = :num_emp");
$verificarNumEmp->execute(['num_emp' => $numero_emp]);

if($verificarNumEmp->rowCount() > 0) {
    echo '<script>
        alert("El número de empleado ya existe");
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
    echo '<script>alert("Ha sido registrado correctamente");</script>';
    header("location: ../controlador.php");
}

?>