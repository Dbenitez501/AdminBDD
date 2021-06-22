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


//CONSULTA PARA INSERTAR LOS DATOS DE LA CONFERENCIA VIRTUAL
$insertar = "INSERT INTO virtual (titulo, descripcion, expositor, fecha_inicio, hora_inicio, plataforma, codigo_plat, estado, cap_actual, cap_max, codigo_asistencia, tipo, imagen, hora_creacion) VALUES ('$titulo', '$desc', '$expositor', '$fecha', '$hora', '$plataforma', '$codigo_plat', '$estado', '$cap_actual', '$cap_max', '$codigo_as', '$tipo', '$userpic', now())";

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