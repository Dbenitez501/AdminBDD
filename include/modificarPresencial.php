<?php
modificarPre($_POST['id'], $_POST['titulo'], $_POST['descripcion'], $_POST['expositor'], $_POST['fecha'], $_POST['hora'], $_POST['lugar'], $_POST['codigo_as'], $_POST['estado']);

function modificarPre($id, $titulo, $desc, $expositor, $fecha, $hora, $lugar, $cod_as, $estado)
{
    include_once 'db.php';
    $db = new DB();
    $update = "UPDATE presencial SET titulo=:titulo, descripcion=:descripcion, expositor=:expositor, fecha_inicio=:fecha, hora_inicio=:hora, estado=:estado, id_lugar=:lugar, codigo_asistencia=:cod_as WHERE id_presencial=:id";
            
    //EJECUTA LA CONSULTA
    $query = $db->connect()->prepare($update);
    $query->execute(['id'=>$id, 'titulo'=>$titulo, 'descripcion'=>$desc, 'expositor'=>$expositor, 'fecha'=>$fecha, 'hora'=>$hora, 'estado'=>$estado, 'lugar'=>$lugar, 'cod_as'=>$cod_as]);
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