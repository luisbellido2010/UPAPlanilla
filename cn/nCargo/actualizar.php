<?php

require '../../cd/dCargos.php';
include '../validatorinput.php';

try {
    $pidtbcarg = htmlspecialchars(trim($_POST['idtbcarg']));
    $pnombcarg = htmlspecialchars(trim($_POST['nombcarg']));
    $pstatcarg = htmlspecialchars(trim($_POST['statcarg']));
    $pro = new dCargos();
    $pro->dUpdateCargo($idtbcarg, $pnombcarg, $pstatcarg);
    if ($pro->getStmt()) {
        echo json_encode(array('okMsg' => 'Registro actualizado correctamente'));
    } else {
        echo json_encode(array('errorMsg' => 'Some errors occured.'));
    }
} catch (ErrorException $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
}

