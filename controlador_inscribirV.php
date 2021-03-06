<?php
include_once 'include/user_session.php';
include_once 'include/presencial.php';
include_once 'include/virtual.php';
include_once 'include/user.php';
include_once 'include/db.php';
$db = new DB();

$presencial = new Presencial();
$virtual = new Virtual();

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

    $insertar = "INSERT INTO registros (id_virtual, id_usuario, asistencia) VALUES ('$idConf', '$idUsu', '$asistencia')";

    


    //VERIFICA QUE NO SE INSCRIBA A LA MISMA HORA Y EL MISMO DÍA EN UNA VIRTUAL
    $horaV = $virtual->getHoraAlt($idConf);
    $fechaV = $virtual->getFechaAlt($idConf);

    $verificaDiaHoraVirtual = $db->connect()->prepare("SELECT * FROM registros INNER JOIN usuarios ON registros.id_usuario=usuarios.id_usuario 
        INNER JOIN virtual ON registros.id_virtual=virtual.id_virtual WHERE usuarios.id_usuario=:user AND fecha_inicio=:fecha AND hora_inicio=:hora");    
    $verificaDiaHoraVirtual->execute(['user'=>$idUsu, 'fecha'=>$fechaV, 'hora'=>$horaV]);

    $verificaDiaHoraPre = $db->connect()->prepare("SELECT * FROM registros INNER JOIN usuarios ON registros.id_usuario=usuarios.id_usuario 
    INNER JOIN presencial ON registros.id_presencial=presencial.id_presencial WHERE usuarios.id_usuario=:user AND fecha_inicio=:fecha AND hora_inicio=:hora");    
    $verificaDiaHoraPre->execute(['user'=>$idUsu, 'fecha' => $fechaV, 'hora' => $horaV]);

    if($verificaDiaHoraVirtual->rowCount() > 0 || $verificaDiaHoraPre->rowCount() > 0) {
        echo '<script>
            alert("Ocupado en la fecha '.$fechaV.' a las '.$horaV.' horas");
            window.location = "controlador.php";
        </script>';
        exit;
    }



    //VERIFICA SI YA SE INSCRIBIÓ A ESA CONFERENCIA
    $verificaInscripcion = $db->connect()->prepare("SELECT * FROM registros WHERE id_usuario=:user AND id_virtual=:id");
    $verificaInscripcion->execute(['user'=>$idUsu, 'id'=>$idConf]);
    if($verificaInscripcion->rowCount() > 0) {
        echo '<script>
            alert("Ya está inscrito");
            window.location = "controlador.php";
        </script>';
        exit;
    }


    $procedure = $db->connect()->prepare('CALL conteo_capacidad_virtual(?)');
    $procedure->bindParam(1, $idConf, PDO::PARAM_INT);
    $procedure->execute();

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