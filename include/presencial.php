<?php
include_once 'db.php';

class Presencial extends DB
{
    //CONSULTA PARA MOSTRAR UBICACION EN EL INDEX (MENU PRINCIPAL)
    public function getUbicacion($titulo)
    {
        $query = $this->connect()->prepare('SELECT ubicacion FROM lugar_expo INNER JOIN presencial ON lugar_expo.id_lugar = presencial.id_lugar WHERE presencial.estado = 1 AND presencial.titulo = :titulo');
        $query->execute(['titulo' => $titulo]);

        foreach($query as $ubicacion) {
            return $ubicacion['ubicacion'];
        }
    }

    //CONSULTA PARA MOSTRAR NOMBRE DE LUGAR EN EL INDEX (MENU PRINICPAL)
    public function getNombreLugar($titulo)
    {
        $query = $this->connect()->prepare('SELECT nombre FROM lugar_expo INNER JOIN presencial ON lugar_expo.id_lugar = presencial.id_lugar WHERE presencial.estado = 1 AND presencial.titulo = :titulo');
        $query->execute(['titulo' => $titulo]);

        foreach($query as $nombre) {
            return $nombre['nombre'];
        }
    }

    //CONSULTA PARA MOSTRAR UBICAICON DE LUGAR EN TABLA DE ADMIN
    public function getUbicacionTabla($id)
    {
        $query = $this->connect()->prepare('SELECT ubicacion FROM lugar_expo INNER JOIN presencial ON lugar_expo.id_lugar = presencial.id_lugar WHERE presencial.id_presencial = :id');
        $query->execute(['id' => $id]);

        foreach($query as $ubicacion) {
            return $ubicacion['ubicacion'];
        }
    }

    //CONSULTA PARA MOSTRAR NOMBRE DE LUGAR EN TABLA DE ADMIN
    public function getNombreLugarTabla($id)
    {
        $query = $this->connect()->prepare('SELECT nombre FROM lugar_expo INNER JOIN presencial ON lugar_expo.id_lugar = presencial.id_lugar WHERE presencial.id_presencial = :id');
        $query->execute(['id' => $id]);

        foreach($query as $nombre) {
            return $nombre['nombre'];
        }
    }

    //OBTIENE EL ESTADO DE LA CONFERENCIA Y LO TRANSFORMA A TEXTO PARA MOSTRAR EN TABLA
    public function getEstado($estado)
    {
        if($estado == 1) {
            $est = "Activado";
            return $est;
        } else {
            $est = "Desactivado";
            return $est;
        }
    }

    //CONSULTA PARA OBTENER NOMBRE DE LUGAR POR ID
    public function getNombreByID($id)
    {
        $query = $this->connect()->prepare('SELECT nombre FROM lugar_expo INNER JOIN presencial ON lugar_expo.id_lugar = presencial.id_lugar WHERE presencial.id_presencial = :id');
        $query->execute(['id' => $id]);

        foreach($query as $nombre) {
            return $nombre['nombre'];
        }
    }
}

?>