<?php

include_once 'include/user_session.php';
include_once 'include/user.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user']))
{
    //"Hay sesión existente";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/proyecto.php';

} elseif(isset($_POST['username']) && isset($_POST['password'])) {
    //"Si no hay sesión, pero hay valores en los campos de texto del inicio de sesión";
    //Obtenemos los valores de los campos con POST
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm))
    {
        //Si el usuario existe en la BD, entonces obtenemos sus datos";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'vistas/proyecto.php';

    } else {
        //Nombre de usuario y/o contraseña incorrectos";
        $errorLogin = "Nombre de usuario y/o Contraseña incorrectos";
        include_once 'vistas/inicio_sesion.php';
    }

} else {
    //"Login";
    include_once 'vistas/inicio_sesion.php';
}

?>