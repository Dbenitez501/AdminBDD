<?php
include_once 'db.php';

class ConsultaPre extends DB
{
    public function consultarPre($id)
    {
        $query = $this->connect()->prepare("SELECT * FROM presencial WHERE id_presencial = :id");
        $query->execute(['id' => $id]);

        $filas = $query->fetch(PDO::FETCH_ASSOC);
        return [
            $filas['titulo'],
            $filas['descripcion'],
            $filas['expositor'],
            $filas['fecha_inicio'],
            $filas['hora_inicio'],
            $filas['estado'],
            $filas['id_lugar'],
            $filas['codigo_asistencia'],
            $filas['imagen']
        ];
    }
}

?>