
<?php 
    $conexion = mysqli_connect('bqejlphwelhmqmqkgixg-mysql.services.clever-cloud.com','uf1l6xcn5mhhk7sm','S3YIznA9DyhJzOcS6JIm','bqejlphwelhmqmqkgixg');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" >
    <title>Cargar Datos</title>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.8.2/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.8.2/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../demo.css">
    <script type="text/javascript" src="jquery-easyui-1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.8.2/jquery.easyui.min.js"></script>
</head>
<body>
    <br>
    <center>
    <br>
    <form  method="post" class = "form_search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar"   >
        <input type="submit" value="Buscar" class="btn_search">
    </form>

    <br>

    <table id="dg" title="My Users" class="easyui-datagrid" style="width:700px;height:250px"
            
             pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="idfactura" width="50">ID FACTURA</th>
                <th field="idcliente" width="50">ID CLIENTE</th>
                <th field="fecha" width="50">FECHA</th>
                <th field="total" width="50">TOTAL</th>
            </tr>
            
        </thead>
        
        <?php 
            
            $busqueda = $_POST['busqueda'];
            $sql = "SELECT * FROM maestrofactura WHERE IDFACTURA LIKE '%$busqueda%' ";
            $result = mysqli_query($conexion,$sql);
            // Conteo de usuarios
            $sentencia = "SELECT COUNT(IDFACTURA) AS TOTAL FROM maestrofactura";
            $conteo = mysqli_query($conexion,$sentencia);
            $respuesta = mysqli_fetch_assoc($conteo);
            while ($mostrar = mysqli_fetch_array($result)) {
                # code...
                
        ?>
        
        <tr>
            <td> <?php echo $mostrar['IDFACTURA']?></td>
            <td> <?php echo $mostrar['IDCLIENTE']?></td>
            <td> <?php echo $mostrar['FECHA']?></td>
            <td> <?php echo $mostrar['TOTAL']?></td>
        </tr>
        
            <?php 
            }?>
    </table>


    <div >
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
    </div>
    

    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = 'save_user.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#fm').form('load',row);
                url = 'update_user.php?id='+row.id;
            }
        }


    </script>
            
    <br>

    </center>
</body>
</html>