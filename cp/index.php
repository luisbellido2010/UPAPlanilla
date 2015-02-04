<?php
require_once '../cn/nMenu.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <?php
        $cad = '';
        include 'view/plugins.php';
        ?>
        <script type="text/javascript">
            $(function () {
                $('.cs-navi-tab').click(function () {
                    var $this = $(this);
                    var href = $this.attr('src');
                    var title = $this.attr('title');
                    addTab(title, href);
                });

            });
            function addTab(title, url) {
                if ($('#myContendPage').tabs('exists', title)) {
                    $('#myContendPage').tabs('select', title);
                } else {
                    var content = createFrame(url);
                    $('#myContendPage').tabs('add', {
                        title: title,
                        content: content,
                        closable: true,
                        tools: [{
                                iconCls: 'icon-mini-refresh',
                                handler: function () {
                                    var currTab = $('#myContendPage').tabs('getSelected');
                                    var url = $(currTab.panel('options').content).attr('src');
                                    if (url != undefined && currTab.panel('options').title != 'Bienvenido') {
                                        $('#myContendPage').tabs('update', {
                                            tab: currTab,
                                            options: {
                                                content: createFrame(url)
                                            }
                                        })
                                    }
                                }
                            }]
                    });
                }
            }

            function createFrame(url) {
                var s = '<iframe scrolling="auto" frameborder="0"  src="' + url + '" style="width:100%;height:80%;"></iframe>';
                return s;
            }

        </script>
        <style type="text/css">
            #branding {
                font-weight:normal;
                text-align:left;
                padding:2em 1em 1.6em 1em;
                margin-bottom:0;
                background:url(img/header-repeat.jpg) repeat-x;
            }
            .header-repeat{background:url(img/header-repeat.jpg) repeat-x;}
            #branding a{color:#A1EAFF; font-weight:normal;}
            #branding a:hover{color:#fff;}
            #branding a:before{content:"|"; color:#fff;}
            #branding ul, #branding ul li{margin:0px; padding:0px; }
            #branding li{padding:0px 0px 0px 0px !important;}
            .top-10{margin-top:-10px;}
            .floatleft{float:left;}
            .floatright{float:right;}
            .fontwhite{color:#fff;}
            .small{font-size:9px;}
            .inline-ul li{display:inline; color:#fff;}
            .marginleft10{margin-left:10px;}
            .grey{color:#C2C2C2;}
            .titlelogo{padding-left: 10px; font-weight: bold;font-size: 18px;}
            a:link {
                text-decoration: none;
            }
            a:visited {
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
            a:active {
                text-decoration: none;
            }
            .cs-navi-tab {
                padding: 5px;
            }
        </style>
    </head>
    <body class="easyui-layout">
        <div data-options="region:'north',border:false" style="height:55px; background: none repeat scroll 0% 0% #2E5E79;">
            <div id="branding">
                <div class="floatleft">
                    <img src="js/jqueryeasy/themes/icons/system.png" alt="Logo" />
                    <label class="grey titlelogo">MI EMPRESA</label>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Bienvenido - Pancrasio</li>
                            <li><a href="#">Configuración</a></li>
                            <li><a href="#">Salir</a></li>
                        </ul>
                        <br />
                        <span class="small grey">Cantidad de Usuarios conectados: 1</span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>

        <div data-options="region:'west',split:false" title="Opciones Generales" style="width:170px;">
            <div class="easyui-accordion" data-options="fit:true,border:false" id="myacordeon">
                <?php
                $array = nListMenus();
                if ($array != NULL) {
                    foreach ($array as $c => $r) {
                        ?>
                        <div title="<?= $r->nombmenu ?>" style="padding:10px;">
                            <?php
                            $arrays = nListSubMenus($r->idtbmenu);
                            if ($arrays != NULL) {
                                foreach ($arrays as $v => $rs) {
                                    ?>
                                    <a href="javascript:void(0);" title="<?= $rs->notbsume ?>" src="<?= $rs->urlpsume ?>" class="cs-navi-tab">
                                        <?= $rs->nombsume ?></a></p>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div id="mainPanle" region="center" border="true" border="false">
            <div id="myContendPage" class="easyui-tabs"  fit="true" border="false" >
                <div title="Bienvenido">
                    <div class="cs-home-remark">
                        <div style="padding-left: 5px;">
                            <p>Mi página de inicio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div region="south" border="false" id="south"><center>Todos los Derechos Reservados © 2014</center></div>
    </body>
</html>