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

// IMAGEN
$img_file = $_FILES['imagen']['name'];
$tmp_dir = $_FILES['imagen']['tmp_name'];
$img_size = $_FILES['imagen']['size'];

$upload_dir = '../img/expositor_img/'; // upload directory
$img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION)); // obtener la extension de la imagen
$valid_ext = array('jpeg', 'jpg', 'png'); // extensiones validas

// renombrar imagen
$userpic = rand(1000,1000000).".".$img_ext;
if(in_array($img_ext, $valid_ext)) {
    //checar tamaño del archivo 5MB
    if($img_size < 5000000) {
        move_uploaded_file($tmp_dir, $upload_dir.$userpic);
    } else {
        echo '<script>
        alert("El archivo es muy largo, menor a 5MB");
        window.history.go(-1);
        </script>';
    }
} else {
    echo '<script>
        alert("Solo formatos de imagen JPG, JPEG y PNG");
        window.history.go(-1);
        </script>';
}





$insertar = "INSERT INTO presencial (titulo, descripcion, expositor, fecha_inicio, hora_inicio, capacidad_actual, estado, id_lugar, codigo_asistencia, tipo, imagen, hora_creacion) VALUES ('$titulo', '$desc', '$expositor', '$fecha', '$hora', '$cap_actual', '$estado', '$lugar', '$codigo_as', '$tipo', '$userpic', now())";

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