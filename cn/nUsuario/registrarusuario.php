<?php

require '../../cd/dUsuario.php';
include '../validatorinput.php';

try {
    $codiusua = htmlspecialchars(trim($_POST['codiusua']));
    $nocousua = htmlspecialchars(trim($_POST['nocousua']));
    $clavusua = htmlspecialchars(trim($_POST['clavusua']));
    $aliausua = htmlspecialchars(trim($_POST['aliausua']));
    $codipers = htmlspecialchars(trim($_POST['codipers']));
    $statusua = htmlspecialchars(trim($_POST['statusua']));
    $pro = new dUsuario();
    $pro->dInsertarUsuario($codiusua, $nocousua, $clavusua, $aliausua, $codipers, $statusua);
    if ($pro->getStmt()) {
        echo json_encode(array('okMsg' => 'Usuario registrado correctamente'));
    } else {
        echo json_encode(array('errorMsg' => 'Some errors occured.'));
    }
} catch (ErrorException $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
}

