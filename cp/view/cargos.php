<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <?php
        $cad = '../';
        include './plugins.php';
        ?>
        <script type="text/javascript">
            $(function () {
                $('#statcarg').combobox({
                    url: '../../cn/nStatus.php',
                    valueField: 'id',
                    textField: 'text',
                    panelHeight: 'auto',
                    prompt: 'Seleccione ...',
                    editable: false,
                    method: 'get',
                    required: true
                });
                $('#btnSav').linkbutton('disable');
                $("#btnNew").click(function () {
                    var value = $(this).text();
                    var equal = value.substring(0, 1);
                    if (equal == 'N') {
                        urlpag = "../../cn/nCargo/registrar.php";
                        $(this).linkbutton({
                            iconCls: 'icon-cancel',
                            text: 'Cancelar'
                        });
                        $('#frmCargo').form('clear');
                        texboxfocus('nombcarg');
                        $('#btnSav').linkbutton('enable');
                    } else {
                        newproc();
                    }
                });
                $("#btnSea").click(function () {
                    $('#dlgListCargo').dialog('open');
                    $('#tbListaCargo').datagrid('reload');
                });
                
                $('#tbListaCargo').datagrid({
                    url: '../../cn/nCargo/listar.php',
                    singleSelect: true,
                    columns: [[
                            {field: 'idtbcarg', title: 'Id', width: 50},
                            {field: 'nombcarg', title: 'Nombre', width: 300},
                            {field: 'statcarg', title: 'Estado', width: 60, align: 'center'}
                        ]]
                });
            });
            var urlpag = "";
            function procesardatos() {
                $('#frmCargo').form('submit', {
                    url: urlpag,
                    onSubmit: function (param) {
                        return $(this).form('enableValidation').form('validate');
                    },
                    success: function (result) {
                        var result = eval('(' + result + ')');
                        if (result.errorMsg) {
                            error(result.errorMsg);
                        } else {
                            newproc();
                            info(result.okMsg);
                        }
                    }
                });
            }
            function newproc() {
                $("#btnNew").linkbutton({
                    iconCls: 'icon-new',
                    text: 'Nuevo'
                });
                $('#btnSav').linkbutton('disable');
            }

        </script>
    </head>
    <body>
        <div class="easyui-panel" style="position:relative;width:100%;height:500px;overflow:auto;">
            <div id="win" class="easyui-window" title="Registro de Cargos" style="width:400px;height:250px"
                 data-options="iconCls:'icon-system',minimizable:false,resizable:false,closable:false,maximizable:false,inline:true">
                <div id="dlg-toolbar" style="padding:2px 0">
                    <a href="javascript:void(0)" id="btnNew" class="easyui-linkbutton" data-options="iconCls:'icon-new',plain:true">Nuevo</a>|
                    <a href="javascript:void(0)" id="btnSav" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="procesardatos();">Guardar</a>|
                    <a href="javascript:void(0)" id="btnSea" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true">Buscar</a>
                    <div id="p" class="easyui-panel" title="" style="width:100%;height:184px;padding:10px;">
                        <form id="frmCargo" method="post" data-options="novalidate:true" class="easyui-form">
                            <table style="width: 100%" cellpadding="10">
                                <tr>
                                    <td>Nombre:</td>
                                    <td><input class="easyui-textbox" style="width:250px;height:22px;" maxlength="4" name="nombcarg" id="nombcarg" data-options="required:true,validType:'length[1,45]'" /></td>
                                </tr>
                                <tr>
                                    <td>Estado:</td>
                                    <td><input id="statcarg" name="statcarg" style="width:125px;height:22px;" value=""></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="dlgListCargo" class="easyui-dialog" title="Buscar cargo" style="width:440px;height:200px;"
             data-options="iconCls:'icon-search',resizable:true,closed: true,modal:true,buttons: '#dlg-buttonsListCargo'">
            <table id="tbListaCargo" style="width: 100%; height: 92%"></table>
        </div>
        <div id="dlg-buttonsListCargo">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="alert('save');">Aceptar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#dlgListCargo').dialog('close');">Cancelar</a>
        </div>
    </body>
</html>
