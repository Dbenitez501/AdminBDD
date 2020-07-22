<?php
include_once 'db.php';

class Virtual extends DB 
{
    public function getPlataforma($titulo)
    {
        $query = $this->connect()->prepare('SELECT plataforma FROM virtual WHERE estado=1 AND titulo = :titulo');
        $query->execute(['titulo' => $titulo]);

        foreach($query as $plataforma) {
            return $plataforma['plataforma'];
        }
    }
}

?>