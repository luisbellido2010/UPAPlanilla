<?php

include '../cd/dMenu.php';
include 'validatorinput.php';
$usuarioonline = "LBELLIDOT";

function nListMenu() {
    $array = array();
    try {
        $obj = new dMenu();
        $obj->dListMenu();
        while ($r = $obj->getDataR()) {
            $array[] = new MenuSis($r->idtbmenu, $r->nombmenu, 0);
        }
    } catch (ErrorException $er) {
        $array = NULL;
    } catch (Exception $er) {
        $array = NULL;
    }
    return $array;
}

function nListMenus() {
    global $usuarioonline;
    $array = array();
    try {
        $obj = new dMenu();
        $obj->dListMenus($usuarioonline);
        while ($r = $obj->getDataR()) {
            $array[] = new MenuSis($r->idtbmenu, $r->nombmenu, 0);
        }
    } catch (ErrorException $er) {
        $array = NULL;
    } catch (Exception $er) {
        $array = NULL;
    }
    return $array;
}

//echo json_encode(nListMenus());
function nListSubMenus($idmenu) {
    global $usuarioonline;
    $array = array();
    try {
        $obj = new dMenu();
        $obj->dListSubMenus($usuarioonline, $idmenu);
        while ($r = $obj->getDataR()) {
            $array[] = new SubmenuSis(
                    $r->idtbsume, $r->nombsume, $r->urlpsume, $r->notbsume, $r->total
            );
        }
    } catch (ErrorException $er) {
        $array = NULL;
    } catch (Exception $er) {
        $array = NULL;
    }
    return $array;
}

function nListSubMenusXUsuario($idmenu, $usuarioonline) {
    $array = array();
    try {
        $obj = new dMenu();
        $obj->dListSubMenus($usuarioonline, $idmenu);
        while ($r = $obj->getDataR()) {
            $array[] = new SubmenuSis(
                    $r->idtbsume, $r->nombsume, $r->urlpsume, $r->notbsume, $r->total
            );
        }
    } catch (ErrorException $er) {
        $array = NULL;
    } catch (Exception $er) {
        $array = NULL;
    }
    return $array;
}

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

class MenuSis {

    public $idtbmenu;
    public $nombmenu;
    public $select;

    function __construct($idtbmenu, $nombmenu, $select) {
        $this->idtbmenu = $idtbmenu;
        $this->nombmenu = $nombmenu;
        $this->select = $select;
    }

}

class SubmenuSis {

    public $idtbsume;
    public $nombsume;
    public $urlpsume;
    public $notbsume;
    public $total;

    function __construct($idtbsume, $nombsume, $urlpsume, $notbsume, $total) {
        $this->idtbsume = $idtbsume;
        $this->nombsume = $nombsume;
        $this->urlpsume = $urlpsume;
        $this->notbsume = $notbsume;
        $this->total = $total;
    }

}
