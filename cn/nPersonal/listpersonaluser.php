<?php

require '../../cd/dPersonal.php';
include '../validatorinput.php';
try {
    $pro = new dPersonal();
    $result = array();
    $pro->dListPersonalUser();
    while ($row = $pro->getData()) {
        $result[] = array_map('utf8_encode', $row);
    }
    echo json_encode($result);
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} 

