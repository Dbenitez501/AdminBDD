<?php
modificarLugar($_POST['id'], $_POST['nombre'], $_POST['cap_max'], $_POST['ubicacion'], $_POST['desc']);

function modificarLugar($id, $nombre, $cap_max, $ubicacion, $desc)
{
    include_once 'db.php';
    $db = new DB();
    $update = "UPDATE lugar_expo SET nombre=:nombre, ubicacion=:ubicacion, capacidad_max=:cap_max, descripcion=:descripcion WHERE id_lugar=:id";

    //EJECUTA LA CONSULTA
    $query = $db->connect()->prepare($update);
    $query->execute(['id'=>$id, 'nombre'=>$nombre, 'ubicacion'=>$ubicacion, 'cap_max'=>$cap_max, 'descripcion'=>$desc]);
    if(!$query) {
        echo '<script>
            alert("Error al modificar");
            window.history.go(-1);
        </script>';
    } else {
        echo '<script>
                alert("Lugar modificado correctamente");
                window.location = "../vistas/admin_lugares.php";
            </script>';
    }
}
?>