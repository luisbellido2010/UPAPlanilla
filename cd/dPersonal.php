<?php

require 'dConexion.php';

class dPersonal extends dConexion {

    function dListPersonalUser() {
        $query = "SELECT concat(t.codipers,';',upper(concat(substring(t.nom1pers,1,1),t.appapers,substring(t.apmapers,1,1))))as codipers, 
                         concat(t.appapers,' ',t.apmapers,' ',t.nom1pers,' ',t.nom2pers) as personal
                  FROM tm_personal t where t.statpers='A';";
        return $this->getQueryList($query);
    }

}
