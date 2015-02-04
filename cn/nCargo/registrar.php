<?php

require '../../cd/dCargos.php';
include '../validatorinput.php';  
$pnombcarg = htmlspecialchars(trim($_POST['nombcarg']));
$pro = new dCargos(); 
$pro->dInsertCargo($pnombcarg, 'A');
//$firstname = htmlspecialchars($_POST['nombcarg']);
echo json_encode(array('okMsg' =>$pnombcarg ));

//$lastname = htmlspecialchars($_REQUEST['lastname']);
//$phone = htmlspecialchars($_REQUEST['phone']);
//$email = htmlspecialchars($_REQUEST['email']);

/*
try {
    $pnombcarg = htmlspecialchars(trim($_POST['nombcarg']));
    $pstatcarg = trim($_POST['statcarg']);
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

*/