<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <?php
        $cad = 'cp/';
        include './cp/view/plugins.php';
        ?>
        <style type="text/css">
            body{
                background-image:url('cp/img/body.png');
            }
            #frmLogin label{
                display:block;
                width:100px;
                padding: 5px;
            }
        </style>
        <script type="text/javascript">
            $(function () {
                texboxfocus('#userdata');
                $('#userdata').textbox('textbox').bind('keydown', function (e) {
                    if (e.keyCode == 13) {
                        texboxfocus('#passdata');
                    }
                });
                $('#passdata').textbox('textbox').bind('keydown', function (e) {
                    if (e.keyCode == 13) {
                        $("#btnLogin").click();
                    }
                });
                $("#btnLogin").click(function () {
                    $('#frmLogin').form('submit', {
                        url: 'cn/nSeguridad/login.php',
                        onSubmit: function (param) {
                            return $(this).form('enableValidation').form('validate');
                        },
                        success: function (result) {
                            var result = eval('(' + result + ')');
                            if (result.errorMsg) {
                                $('#frmLogin').form('clear');
                                $('#msgrpta').html('<div class="error"></div>').show();
                                $('.error').hide(0).html('Usuario o clave incorrecto');
                                $('.error').slideDown(500);
                                setTimeout(function () {
                                    $("#msgrpta").hide();
                                }, 3000);
                            } else {
                                $('#msgrpta').html('<div class="box-success"></div>').show();
                                $('.box-success').hide(0).html('Bienvenido, Cargando pagina...');
                                $('.box-success').slideDown(500);
                                setTimeout(function () {
                                    window.location.href = "cp";
                                }, (1000 + 800));
                            }
                        }
                    });
                });
            });

        </script>
    </head>
    <body>
        <div id="center">
            <div class="easyui-panel"  iconCls="icon-lock_1" title="Ingreso al Sistema" style="width:400px">
                <div style="padding:10px 60px 20px 60px; background-color: #a4b8ca" >
                    <form id="frmLogin" method="POST" data-options="novalidate:true" class="easyui-form">
                        <div>
                            <label for="Usuario" class="mylabel">Usuario:</label>
                            <input class="easyui-textbox" id="userdata" name="userdata" style="width:100%;height:27px;" data-options="required:true,prompt:'Ingrese su usuario',iconCls:'icon-man',iconWidth:38">
                        </div>
                        <div style="padding-top: 10px;">
                            <label for="Contraseña" class="mylabel">Contraseña:</label>
                            <input class="easyui-textbox" id="passdata" name="passdata" style="width:100%;height:27px;" data-options="required:true,prompt:'Ingrese su contraseña',iconCls:'icon-lock',iconWidth:38" type="password">
                        </div>
                        <div id="msgrpta" style="padding-top: 5px; padding-bottom: 5px;"></div>
                        <div style="padding-top: 15px; text-align: right;">
                            <a href="javascript:void(0)" id="btnLogin" class="easyui-linkbutton" iconCls="icon-sign-in" >Ingresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
