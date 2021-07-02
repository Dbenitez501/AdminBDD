<?php
modificarAdmin($_POST['id'], $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['sexo'], $_POST['username'], $_POST['contra'], $_POST['tipo']);

function modificarAdmin($id, $nombre, $email, $telefono, $sexo, $username, $contra, $tipo)
{
    include_once 'db.php';
    $db = new DB();
    $update = "UPDATE usuarios SET username=:username, contra=:contra, nombre=:nombre, correo=:correo, telefono=:telefono, sexo=:sexo, id_tipo=:tipo WHERE id_usuario=:id";

    //EJECUTA LA CONSULTA
    $query = $db->connect()->prepare($update);
    $query->execute(['id'=>$id, 'username'=>$username, 'contra'=>$contra, 'nombre'=>$nombre, 'correo'=>$email, 'telefono'=>$telefono, 'sexo'=>$sexo, 'tipo'=>$tipo]);
    if(!$query) {
        echo '<script>
            alert("Error al modificar");
            window.history.go(-1);
        </script>';
    } else {
        echo '<script>
                alert("Administrador modificado correctamente");
                window.location = "../vistas/administradores.php";
            </script>';
    }
}

?>