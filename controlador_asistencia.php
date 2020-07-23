<?php

include_once 'include/user_session.php';
include_once 'include/user.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user']))
{
    //"Hay sesión existente";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/tabla_asistencias.php';
}