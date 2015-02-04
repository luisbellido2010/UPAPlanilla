<?php

header("Content-Type: text/html;charset=utf-8");
require 'dConexion.php';

class dCargos extends dConexion {

    function dListarCargo() {
        $query = "SELECT t.idtbcarg, t.nombcarg, t.statcarg FROM ta_cargos t;";
        return $this->getQueryList($query);
    }

    function dInsertCargo($pnombcarg, $pstatcarg) {
        $query = "INSERT INTO ta_cargos (idtbcarg,nombcarg,statcarg)VALUES
        ((SELECT if(max(c.idtbcarg)IS NULL,1,max(c.idtbcarg)+1) FROM ta_cargos c),'$pnombcarg','$pstatcarg')";
        return $this->getQuery($query);
    }

    function dUpdateCargo($idtbcarg, $pnombcarg, $pstatcarg) {
        $query = "UPDATE ta_cargos SET nombcarg = '$pnombcarg', statcarg = '$pstatcarg' WHERE idtbcarg = $idtbcarg";
        return $this->getQuery($query);
    }

}
