<?php

$array = array();

$array = array(
    new nMenu(1, 'Personal', '/view/personal.php', 'Personal'),
    new nMenu(2, 'Usuarios', '/view/personal.php', 'Usuarios'),
    new nMenu(3, 'Cargos', '/view/personal.php', 'Cargos')
);

echo json_encode($array);

class nMenu {

    public $id = 0;
    public $text = "";
    public $src = "";
    public $tabs = "";

    function __construct($id, $text, $src, $tabs) {
        $this->id = $id;
        $this->text = $text;
        $this->src = $src;
        $this->tabs = $tabs;
    }

}


