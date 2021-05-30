<?php
include_once 'db.php';
$db = new DB();

$titulo = $_POST['titulo'];
$desc = $_POST['descripcion'];
$expositor = $_POST['expositor'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$codigo_as = $_POST['codigo_as'];
$cap_actual = 0;
$estado = 1;
$tipo = "Presencial";

$insertar = "INSERT INTO presencial (titulo, descripcion, expositor, fecha_inicio, hora_inicio, capacidad_actual, estado, id_lugar, codigo_asistencia, tipo) VALUES ('$titulo', '$desc', '$expositor', '$fecha', '$hora', '$cap_actual', '$estado', '$lugar', '$codigo_as', '$tipo')";

//VERIFICA SI YA ESTÁ OCUPADO EL LUGAR EN UNA HORA
$verificaLugarHora = $db->connect()->prepare("SELECT * FROM presencial WHERE hora_inicio = :hora AND id_lugar = :lugar AND fecha_inicio = :fecha");
$verificaLugarHora->execute(['hora' => $hora, 'lugar' => $lugar, 'fecha' => $fecha]);

if($verificaLugarHora->rowCount() > 0) {
    echo '<script>
        alert("El lugar a la hora y día desingada ya está ocupado");
        window.history.go(-1);
    </script>';
    exit;
}

//VERIFICA SI YA EXISTE EL CODIGO DE ASISTENCIA
$verificarCodigoAsistencia = $db->connect()->prepare("SELECT * FROM presencial WHERE codigo_asistencia = :cod_as");
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
            alert("Conferencia presencial registrada exitosamente");
            window.location = "../vistas/conferenciasP.php";
        </script>';
}

?>