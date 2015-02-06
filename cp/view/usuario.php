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
                $('#tblUsuarios').datagrid({
                    title: 'Registro de Usuarios',
                    toolbar: [{
                            text: 'Agregar',
                            iconCls: 'icon-useradd',
                            handler: function () {
                                urlpag = '../../cn/nUsuario/registrarusuario.php';
                                $('#myContendPage').tabs('enableTab', 1);
                                $('#myContendPage').tabs('select', 1);
                                $('#frmUsuarios').form('clear');
                            },
                            disabled: false
                        }, '-', {
                            text: 'Editar',
                            iconCls: 'icon-useredit',
                            handler: function () {
                                editarusuario();
                            }
                        }, '-', {
                            text: 'Eliminar',
                            iconCls: 'icon-userdel',
                            handler: function () {
                                //EliminarMarca();
                            }
                        }],
                    rownumbers: true, remoteSort: false, nowrap: false, fitColumns: true, singleSelect: true,
                    pagination: true, method: 'get', url: '../../cn/nUsuario/listausuario.php',
                    columns: [[
                            {field: 'codiusua', title: 'Usuario', width: 250, sortable: true},
                            {field: 'nocousua', title: 'Asignado a', width: 400, sortable: true},
                            //{field: 'clavusua', title: 'clave', width: 0, hidden: true},
                            {field: 'aliausua', title: 'Alias', width: 350, sortable: true},
                            {field: 'codipers', title: 'codigo', width: 0, hidden: true},
                            {field: 'statusua', title: 'Estado', width: 65, align: 'center', formatter:
                                        function (value, row, index) {
                                            return '<img src="../' + urlIconStatus(row.statusua) + '""/>'
                                        }
                            }
                        ]],
                    onDblClickRow: function (index, row) {
                        editarusuario();
                    },
                    onLoadError: function (XMLHttpRequest, textStatus, errorThrown) {
                        error("Error en el Servidor");
                    }
                });

                $('#pcodipers').combobox({
                    url: '../../cn/nPersonal/listpersonaluser.php',
                    valueField: 'codipers',
                    textField: 'personal',
                    panelHeight: 'auto',
                    prompt: 'Seleccione personal...',
                    editable: false,
                    method: 'get',
                    required: true,
                    onSelect: function (rec) {
                        $("#pcodiusua").textbox('setValue', (rec.codipers).split(";")[1]);
                        $("#codiusua").val((rec.codipers).split(";")[1]);
                        $("#codipers").val((rec.codipers).split(";")[0]);
                        $("#nocousua").val(rec.personal);
                    }
                });

                $('#statusua').combobox({
                    url: '../../cn/nStatus.php',
                    valueField: 'id',
                    textField: 'text',
                    panelHeight: 'auto',
                    prompt: 'Seleccione ...',
                    editable: false,
                    method: 'get',
                    required: true
                });

                $('#myContendPage').tabs('disableTab', 1);
                $('#myContendPage').tabs({
                    onSelect: function (title, index) {
                        if (index == 0) {
                            $(this).tabs('disableTab', 1);
                            var roots = $('#treePermisos').tree('getRoots');
                            for (var i = 0; i < roots.length; i++) {
                                var node = $('#treePermisos').tree('find', roots[i].id);
                                $('#treePermisos').tree('uncheck', node.target);
                            }
                        }
                    }
                });
                $.extend($.fn.validatebox.defaults.rules, {
                    equals: {
                        validator: function (value, param) {
                            return value == $(param[0]).val();
                        },
                        message: 'Las contraseña ingresada no coinciden con la anterior'
                    }
                });
            });
            var urlpag = ""
            function guardardatos() {
                $('#frmUsuarios').form('submit', {
                    url: urlpag,
                    onSubmit: function (param) {
                        return $(this).form('enableValidation').form('validate');
                    },
                    success: function (result) {
                        var result = eval('(' + result + ')');
                        if (result.errorMsg) {
                            error(result.errorMsg);
                        } else {
                            info(result.okMsg);
                            $('#myContendPage').tabs('select', 0);
                            $('#tblUsuarios').datagrid('reload');
                        }
                    }
                });
            }

            function editarusuario() {
                urlpag = '../../cn/nUsuario/actualizarusuario.php';
                $('#frmUsuarios').form('clear');
                var row = $('#tblUsuarios').datagrid('getSelected');
                if (row) {
                    $('#frmUsuarios').form('load', row);
                    $('#pcodipers').combobox('setValue', row.codipers + ";" + row.codiusua);
                    $("#pcodiusua").textbox('setValue', row.codiusua);
                    $('#myContendPage').tabs('select', 1);
                }
            }
        </script>
    </head>
    <body>
        <div id="myContendPage" class="easyui-tabs" data-options="tabWidth:100,tabHeight:60" style="width: 100%; height: 500px">
            <div title="<span class='tt-inner'><img src='../img/list-user.png'/><br>Lista</span>" style="padding: 5px">
                <table id="tblUsuarios" style="width: 100%; height: 400px;">
                </table>
            </div>
            <div title="<span class='tt-inner'><img src='..//img/info-user.png'/><br>Detalle</span>" style="padding: 5px">
                <div class="easyui-panel" title="Detalle de Usuario" style="width: 100%; height: 100%; padding: 5px;">
                    <div class="easyui-layout" data-options="fit:true">
                        <div data-options="region:'east',split:false" style="width: 300px; padding: 10px">
                            <div class="easyui-panel" style="padding: 5px">
                                <ul id="treePermisos" class="easyui-tree" data-options="url:'../../cn/permisos.php',method:'get',animate:true,checkbox:true"></ul>
                            </div>
                        </div>
                        <div data-options="region:'center'" style="padding: 0px">
                            <div id="register">
                                <form id="frmUsuarios" method="POST" data-options="novalidate:true" class="easyui-form">
                                    <table style="width: 100%;" border="0">
                                        <tr>
                                            <td>Código</td>
                                            <td>
                                                <input name="pcodiusua" id="pcodiusua" readonly="true"
                                                       style="width: 50%; height: 22px;"
                                                       data-options="validType:'length[2,150]'" class="easyui-textbox" />
                                                <input type="hidden" id="nocousua" name="nocousua" value=""/>
                                                <input type="hidden" id="codiusua" name="codiusua" value=""/>
                                                <input type="hidden" id="codipers" name="codipers" value=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Usuario asignado a: </td>
                                            <td><input id="pcodipers" name="pcodipers" style="width:100%;height:22px;" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Alias</td>
                                            <td>
                                                <input name="aliausua" id="aliausua"
                                                       style="width: 100%; height: 22px;"
                                                       data-options="validType:'length[2,150]'" class="easyui-textbox" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Contraseña
                                            </td>
                                            <td>
                                                <input id="clavusua" name="clavusua" type="password" class="easyui-validatebox textbox" style="width: 50%; height: 22px;" 
                                                       data-options="required:true" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Confirmar contraseña</td>
                                            <td>
                                                <input id="rclavusua" name="rclavusua" type="password" class="easyui-validatebox textbox" style="width: 50%; height: 22px;" 
                                                       data-options="required:true" validType="equals['#clavusua']"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Estado:</td>
                                            <td><input id="statusua" name="statusua" style="width:25%;height:22px;" value=""></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: right; padding-right: 40px;">
                                                <div id="dlg-buttonsListCargo">
                                                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" onclick="guardardatos()">Guardar</a>
                                                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#myContendPage').tabs('select', 0);">Cancelar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style scoped="scoped">
            .tt-inner {
                display: inline-block;
                line-height: 12px;
                padding-top: 4px;
            }

            .tt-inner img {
                border: 0;
            }
        </style>
    </body>
</html>