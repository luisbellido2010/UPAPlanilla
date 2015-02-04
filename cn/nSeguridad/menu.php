<?php

function menus() {
    $array = array();
    $array = array(
        new nMenu(1, 'Personal', '/view/personal.php', 'Personal', 0),
        new nMenu(2, 'Usuarios', '/view/usuarios.php', 'Usuarios', 0),
        new nMenu(3, 'Cargos', '/view/cargos.php', 'Cargos', 1),
        new nMenu(4, 'Planilla', '/view/planilla.php', 'Cargos', 0)
    );
    return $array;
}

//echo json_encode(menus());

class nMenu {

    public $id = 0;
    public $text = "";
    public $src = "";
    public $tabs = "";
    public $select = 0;

    function __construct($id, $text, $src, $tabs, $select) {
        $this->id = $id;
        $this->text = $text;
        $this->src = $src;
        $this->tabs = $tabs;
        $this->select = $select;
    }

}

