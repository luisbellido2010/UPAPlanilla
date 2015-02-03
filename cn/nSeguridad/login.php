<?php

include '../../cd/dUsuario.php';
include '../validatorinput.php';
try {
    $userdata = trim($_POST['userdata']);
    $passdata = trim($_POST['passdata']);
//    if ($pro->getStmt()) {
//        echo json_encode(array('okMsg' => 'Some errors occured.'));
//    } else {
//        echo json_encode(array('errorMsg' => 'Some errors occured.'));
//    }
    echo json_encode(array('okMsg' => 'Usuario ok'));
} catch (ErrorException $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
}
