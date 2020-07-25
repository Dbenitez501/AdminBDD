<?php
include_once 'db.php';
$db = new DB();

$nombre = $_POST['nombre'];
$cap_max = $_POST['cap_max'];
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['desc'];

//CONSULTA PARA INSERTAR DATOS DEL LUGAR DE EXPOSICION
$insertar = "INSERT INTO lugar_expo (nombre, ubicacion, capacidad_max, descripcion) VALUES ('$nombre', '$ubicacion', '$cap_max', '$descripcion')";

//VERIFICA SI YA EXISTE EL LUGAR
$verificaLugar = $db->connect()->prepare("SELECT * FROM lugar_expo WHERE nombre=:nombre AND ubicacion=:ubi");
$verificaLugar->execute(['nombre'=>$nombre, 'ubi'=>$ubicacion]);

if($verificaLugar->rowCount()>0) {
    echo '<script>
        alert("El lugar ya existe");
        window.history.go(-1);
    </script>';
    exit; 
}

//EJECUTA LA CONSULTA DE INSERTAR
$query = $db->connect()->prepare($insertar);
$query->execute();

if(!$query) {
    echo '<script>
        alert("Error al ingresar datos");
        window.history.go(-1);
    </script>';
} else {
    echo '<script>
            alert("Lugar registrado exitosamente");
            window.location = "../vistas/admin_lugares.php";
        </script>';
}

?>