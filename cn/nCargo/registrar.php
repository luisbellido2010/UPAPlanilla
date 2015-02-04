<?php

require '../../cd/dCargos.php';
include '../validatorinput.php';

try {
    $pnombcarg = htmlspecialchars(trim($_POST['nombcarg']));
    $pstatcarg = htmlspecialchars(trim($_POST['statcarg']));
    $pro = new dCargos();
    $pro->dInsertCargo($pnombcarg, $pstatcarg);
    if ($pro->getStmt()) {
        echo json_encode(array('okMsg' => 'Registro guardado correctamente'));
    } else {
        echo json_encode(array('errorMsg' => 'Some errors occured.'));
    }
} catch (ErrorException $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
}