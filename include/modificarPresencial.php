<?php
include_once '../include/consultaPresencial.php';
$cons = new ConsultaPre();
$consulta = $cons->consultarPre($_POST['id']);

// IMAGEN
$img_file = $_FILES['imagen']['name'];
$tmp_dir = $_FILES['imagen']['tmp_name'];
$img_size = $_FILES['imagen']['size'];

// $upload_dir = '../img/expositor_img/'; // upload directory
// $img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION)); // obtener la extension de la imagen
// $valid_ext = array('jpeg', 'jpg', 'png'); // extensiones validas

$userpic;

if($img_file) {
    $upload_dir = '../img/expositor_img/'; // upload directory
    $img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION)); // obtener la extension de la imagen
    $valid_ext = array('jpeg', 'jpg', 'png'); // extensiones validas
    $userpic = rand(1000,1000000).".".$img_ext;

    if(in_array($img_ext, $valid_ext)) {
        //checar tamaño del archivo 5MB
        if($img_size < 5000000) {
            unlink($upload_dir.$consulta[8]);
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
} else {
    //if no image selected
    $userpic = $consulta[8]; // old image
}

modificarPre($_POST['id'], $_POST['titulo'], $_POST['descripcion'], $_POST['expositor'], $_POST['fecha'], $_POST['hora'], $_POST['lugar'], $_POST['codigo_as'], $_POST['estado'], $userpic);

function modificarPre($id, $titulo, $desc, $expositor, $fecha, $hora, $lugar, $cod_as, $estado, $imagen)
{
    include_once 'db.php';
    $db = new DB();
    $update = "UPDATE presencial SET titulo=:titulo, descripcion=:descripcion, expositor=:expositor, fecha_inicio=:fecha, hora_inicio=:hora, estado=:estado, id_lugar=:lugar, codigo_asistencia=:cod_as, imagen=:imagen, hora_creacion=now() WHERE id_presencial=:id";
            
    //EJECUTA LA CONSULTA
    $query = $db->connect()->prepare($update);
    $query->execute(['id'=>$id, 'titulo'=>$titulo, 'descripcion'=>$desc, 'expositor'=>$expositor, 'fecha'=>$fecha, 'hora'=>$hora, 'estado'=>$estado, 'lugar'=>$lugar, 'cod_as'=>$cod_as, 'imagen'=>$imagen]);
    if(!$query) {
        echo '<script>
            alert("Error al modificar");
            window.history.go(-1);
        </script>';
    } else {
        echo '<script>
                alert("Conferencia modificada correctamente");
                window.location = "../vistas/conferenciasP.php";
            </script>';
    }
}

?>