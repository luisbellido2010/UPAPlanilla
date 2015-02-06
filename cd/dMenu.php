<?php

require 'dConexion.php';

class dMenu extends dConexion {

    function dListMenu() {
        $query = "SELECT m.idtbmenu, m.nombmenu FROM tm_menusistema m WHERE m.statmenu='A' and
                 (SELECT count(sm.idtbsume) FROM td_submenusistema sm where sm.idtbmenu=m.idtbmenu)>0;";
        return $this->getQueryList($query);
    }

    function dListMenus($coduser) {
        $query = "SELECT DISTINCT m.idtbmenu,m.nombmenu FROM
        td_permisos AS p INNER JOIN td_submenusistema AS sm ON p.idtbsume = sm.idtbsume
        INNER JOIN tm_menusistema AS m ON sm.idtbmenu = m.idtbmenu
        WHERE m.statmenu = 'A' AND sm.statsume = 'A' AND p.codiusua = '$coduser'";
        return $this->getQueryList($query);
    }

    function dListSubMenus($coduser, $idmenu) {
        $query = "SELECT sm.idtbsume, sm.nombsume, sm.urlpsume, sm.notbsume,
                (SELECT Count(pe.idtbperm) FROM td_permisos AS pe, td_submenusistema AS sms, tm_menusistema AS ms 
                WHERE pe.idtbsume = sms.idtbsume and sms.idtbmenu = ms.idtbmenu AND
                ms.statmenu = 'A' AND sms.statsume = 'A' AND pe.codiusua = '$coduser' AND sms.idtbsume=sm.idtbsume)AS total
                FROM td_submenusistema AS sm
                WHERE sm.statsume = 'A' AND sm.idtbmenu = $idmenu";
        return $this->getQueryList($query);
    }

}
