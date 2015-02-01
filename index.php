<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <?php
        $cad = 'cp/';
        include './cp/view/plugins.php';
        ?>
        
    </head>
    <body>
    <center>
        <div class="easyui-panel"  iconCls="icon-tip" title="Ingreso Marcador" style="width:400px">
            <div style="padding:10px 60px 20px 60px">
                <form id="ff" method="post">
                    <table cellpadding="5">
                        <tr>
                            <td>Usuario :</td>
                            <td><input class="easyui-textbox" type="text" name="name" data-options="prompt:'Ingrese Usuario'"></input></td>
                        </tr>
                        <tr>
                            <td>Contraseña :</td>
                            <td><input class="easyui-textbox" type="password" name="password" data-options="required:true,validType:'email'"></input></td>
                        </tr>
                    </table>
                </form>
                <div style="text-align:center;padding:5px">
                    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" >Aceptar</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCLS="icon-cancel" onclick="clearForm()">Limpiar</a>
                </div>
            </div>
        </div>
    </center>
</body>
</html>