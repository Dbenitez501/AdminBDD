<?php
modificarVir($_POST['id'], $_POST['titulo'], $_POST['descripcion'], $_POST['expositor'], $_POST['fecha'], $_POST['hora'], $_POST['plataforma'], $_POST['codigo_plat'], $_POST['codigo_as'], $_POST['cap_max'], $_POST['estado']);

function modificarVir($id, $titulo, $desc, $expositor, $fecha, $hora, $plat, $codigo_plat, $codigo_as, $cap_max, $estado)
{
    include_once 'db.php';
    $db = new DB();
    $update = "UPDATE virtual SET titulo=:titulo, descripcion=:descripcion, expositor=:expositor, fecha_inicio=:fecha, hora_inicio=:hora, plataforma=:plataforma, codigo_plat=:codigo_plat, estado=:estado, cap_max=:cap_max, codigo_asistencia=:codigo_as WHERE id_virtual=:id";

    //EJECUTA LA CONSULTA
    $query =$db->connect()->prepare($update);
    $query->execute(['id'=>$id, 'titulo'=>$titulo, 'descripcion'=>$desc, 'expositor'=>$expositor, 'fecha'=>$fecha, 'hora'=>$hora, 'plataforma'=>$plat, 'codigo_plat'=>$codigo_plat, 'estado'=>$estado, 'cap_max'=>$cap_max, 'codigo_as'=>$codigo_as]);
    if(!$query) {
        echo '<script>
            alert("Error al modificar");
            window.history.go(-1);
        </script>';
    } else {
        echo '<script>
                alert("Conferencia modificada correctamente");
                window.location = "../vistas/conferenciasV.php";
            </script>';
    }
}
?>