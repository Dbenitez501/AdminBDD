<?php
verificaAsistencia($_POST['id'], $_POST['codigo'], $_POST['comentario']);

function verificaAsistencia($idReg, $cod_as, $comentario)
{
    include_once 'db.php';
    include_once 'presencial.php';
    $db = new DB();
    $pre = new Presencial();
    $asist = 1;
    $idPre = $pre->getIdConf($idReg);

    $update = "UPDATE registros SET asistencia=:asist, comentario=:comentario WHERE id_registro=:id";

    $codigo = $pre->getCodigoConf($idReg);

    if($cod_as == $codigo) {
        $verificaRepetido = $db->connect()->prepare("SELECT * FROM registros WHERE id_registro=:id AND id_presencial=:pre AND asistencia=1");
        $verificaRepetido->execute(['id'=>$idReg, 'pre'=>$idPre]);
        if($verificaRepetido->rowCount()>0) {
            echo '<script>
                alert("Ya registró esta asistencia");
                window.location = "../vistas/tabla_asistencias.php";
            </script>';
            exit; 
        }

        $query = $db->connect()->prepare($update);
        $query->execute(['id'=>$idReg, 'asist'=>$asist, 'comentario'=>$comentario]);
        if(!$query) {
            echo '<script>
                alert("Error al guardar");
                window.history.go(-1);
            </script>';
        } else {
            echo '<script>
                    alert("Asistencia guardada correctamente");
                    window.location = "../vistas/tabla_asistencias.php";
                </script>';
        }
    } else {
        echo '<script>
                alert("Código no es igual"); 
                window.location = "../vistas/asistencia.php?idRegP="+"'.$idReg.'";
        </script>';
    }
}
?>