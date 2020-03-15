<?php

include_once 'conexion.php';
include_once 'config.php';
include_once 'insertar.php';
include_once 'validar.php';
include_once 'usuario.php';

Conexion::abrirConexion();

$validador = new validar($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['fecha'],htmlspecialchars($_POST['contra']) ,htmlspecialchars($_POST['rContra']),Conexion::obtenerConexion());

if ($validador->registroValido()) {
    $usuario = new Usuario('',$validador->getNombre(), $validador->getApellido(), $validador->getCorreo(), $validador->getFecha(),password_hash($validador->getContra(),PASSWORD_DEFAULT));
    $insetarUsuario = insertar::insertarUsuario(Conexion::obtenerConexion(),$usuario);

    if($insetarUsuario){
        echo "insertado";
    }else{
        echo "no insertado";
    }
}else{

    $error = array(
    'errorNombre' => $validador->getNombre(),
    'errorApellido' => $validador->getApellido(),
    'errorCorreo' => $validador->getCorreo(),
    'errorFecha' => $validador->getFecha(),
    'errorContra' => $validador->getContra(),
    'errorRContra' => $validador->getRContra());

    echo json_encode($error);
}

?>