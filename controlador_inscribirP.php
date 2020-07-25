<?php
include_once 'include/user_session.php';
include_once 'include/user.php';
include_once 'include/db.php';
$db = new DB();

$userSession = new UserSession();
$user = new User();

if(!isset($_SESSION['user']))
{
    header("location: controlador.php");
} else if(isset($_SESSION['user'])) {

    $user->setUser($userSession->getCurrentUser());

    $idConf = $_GET['id'];
    $idUsu = $user->getIdUsu();
    $asistencia = 0;

    $insertar = "INSERT INTO registros (id_presencial, id_usuario, asistencia) VALUES ('$idConf', '$idUsu', '$asistencia')";

    $verificaInscripcion = $db->connect()->prepare("SELECT * FROM registros WHERE id_usuario=:user AND id_presencial=:id");
    $verificaInscripcion->execute(['user'=>$idUsu, 'id'=>$idConf]);
    if($verificaInscripcion->rowCount() > 0) {
        echo '<script>
            alert("Ya está inscrito");
            window.location = "controlador.php";
        </script>';
        exit;
    }

    $query = $db->connect()->prepare($insertar);
    $query->execute();

    if(!$query) {
    echo '<script>
        alert("Error al inscribirse");
        window.history.go(-1);
    </script>';
    } else {
    echo '<script>
            alert("Se inscribió correctamente");
            window.location = "controlador.php";
        </script>';
    }
}

?>