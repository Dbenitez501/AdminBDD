<?php
include_once 'db.php';
$db = new DB();

$titulo = $_POST['titulo'];
$desc = $_POST['descripcion'];
$expositor = $_POST['expositor'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$plataforma = $_POST['plataforma'];
$codigo_plat = $_POST['codigo_plat'];
$codigo_as = $_POST['codigo_as'];
$cap_max = $_POST['cap_max'];
$estado = 1;
$cap_actual = 0;
$tipo = "Virtual";

//CONSULTA PARA INSERTAR LOS DATOS DE LA CONFERENCIA VIRTUAL
$insertar = "INSERT INTO virtual (titulo, descripcion, expositor, fecha_inicio, hora_inicio, plataforma, codigo_plat, estado, cap_actual, cap_max, codigo_asistencia, tipo) VALUES 
('$titulo', '$desc', '$expositor', '$fecha', '$hora', '$plataforma', '$codigo_plat', '$estado', '$cap_actual', '$cap_max', '$codigo_as', '$tipo')";

//VERIFICA SI YA EXISTE EL CODIGO DE ASISTENCIA
$verificarCodigoAsistencia = $db->connect()->prepare("SELECT * FROM virtual WHERE codigo_asistencia = :cod_as");
$verificarCodigoAsistencia->execute(['cod_as' => $codigo_as]);

if($verificarCodigoAsistencia->rowCount() > 0) {
    echo '<script>
        alert("El codigo de asistencia ya existe");
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
            alert("Conferencia virtual registrada exitosamente");
            window.location = "../vistas/conferenciasV.php";
        </script>';
}
?>