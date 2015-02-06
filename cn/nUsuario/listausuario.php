<?php

require '../../cd/dUsuario.php';
include '../validatorinput.php';
try {
    $pro = new dUsuario();
    $result = array();
    $pro->dListadeUsuarios();
    while ($row = $pro->getData()) {
        $result['rows'][] = array_map('utf8_encode', $row);
    }
    echo json_encode($result);
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} 