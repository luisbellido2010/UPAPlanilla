<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <?php
        $cad = '';
        include './view/plugins.php';
        require '../cn/nSeguridad/menu.php';
        ?>
        <script type="text/javascript">
            $(function() {
                $('.cs-navi-tab').click(function() {
                    var $this = $(this);
                    var href = $this.attr('src');
                    //var title = $this.text();
                    //addTab(title, href);
                    //alertmsg('msg')
                    alert(href);
                });
            });
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
            #branding a:before{content:" | "; color:#fff;}
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

        <div data-options="region:'west',split:false" title="Opciones Generales" style="width:165px;">
            <div class="easyui-accordion" data-options="fit:true,border:false" id="myacordeon">
                <?php
                foreach (menus() as $c => $r) {
                    ?>
                    <div title="<?php echo $r->text ?>" data-options="selected:<?php echo $r->select == 1 ? 'true' : 'false'; ?>" style="padding:10px;">
                        <a href="javascript:void(0);" src="<?php echo $r->src ?>" class="cs-navi-tab">easyloader</a>
                    </div>
                    <?php
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
