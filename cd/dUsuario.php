<?php

require 'dConexion.php';

class dUsuario extends dConexion {

    function dListadeUsuarios() {
        $query = "SELECT t.codiusua, t.nocousua, t.aliausua, t.codipers, t.statusua "
                . "FROM tm_usuarios t;";
        return $this->getQueryList($query);
    }

    function dInsertarUsuario($codiusua, $nocousua, $clavusua, $aliausua, $codipers, $statusua) {
        $query = "INSERT INTO tm_usuarios(codiusua,nocousua,clavusua,aliausua,codipers,fereusua,statusua)
                VALUES ('$codiusua','$nocousua','$clavusua','$aliausua','$codipers',CURDATE(),'$statusua');";
        return $this->getQuery($query);
    }

    public function dActualizarUsuario($codiusua, $clavusua, $aliausua, $statusua) {
        $query = "UPDATE tm_usuarios SET clavusua='$clavusua',aliausua='$aliausua',statusua='$statusua' "
                . "WHERE codiusua='$codiusua';";
        return $this->getQuery($query);
    }

}
