<?php
modificarAdmin($_POST['id'], $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['sexo'], $_POST['username'], $_POST['contra']);

function modificarAdmin($id, $nombre, $email, $telefono, $sexo, $username, $contra)
{
    include_once 'db.php';
    $db = new DB();
    $update = "UPDATE usuarios SET username=:username, contra=:contra, nombre=:nombre, correo=:correo, telefono=:telefono, sexo=:sexo WHERE id_usuario=:id";

    //EJECUTA LA CONSULTA
    $query = $db->connect()->prepare($update);
    $query->execute(['id'=>$id, 'username'=>$username, 'contra'=>$contra, 'nombre'=>$nombre, 'correo'=>$email, 'telefono'=>$telefono, 'sexo'=>$sexo]);
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